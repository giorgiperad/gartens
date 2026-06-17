<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Model\API\Kindergartener;
use DB;

class Kindergarten extends Model
{
    protected $fillable = [
        'name',
        'municipality_id',
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('m/d/y');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id', 'id');
    }

    public function groupAgeRanges()
    {
        return $this->belongsToMany(
            GroupAgeRange::class,
            'kindergarten_group_age_range',
            'kindergarten_id',   // FK on pivot → kindergartens.id
            'group_age_range'    // FK on pivot → group_age_ranges.id (your DB column!)
        )
        ->withPivot(['space_length', 'space_filled', 'space_free']);
    }

    public function currentAge($rangeId)
    {
        $groupAgeRange = $this->groupAgeRanges()
            ->wherePivot('group_age_range', $rangeId) // ✅ match your DB column
            ->first();

        if ($groupAgeRange) {
            $groupAgeRange->setRelation('byId', $this->KindergartenersByGroupId($rangeId));
        }

        return $groupAgeRange;
    }

    public function Kindergarteners()
    {
        return $this->hasMany(Kindergartener::class)->active();
    }

    public function KindergartenersList()
    {
        return $this->Kindergarteners()
            ->join('group_age_ranges', 'kindergarteners.group_id', '=', 'group_age_ranges.id')
            ->select(
                'kindergarten_id',
                'group_id',
                DB::raw('count(*) as total'),
                'group_age_ranges.range'
            )
            ->groupBy('group_id', 'kindergarten_id');
    }

    public function KindergartenersByGroupId($rangeId)
    {
        return $this->KindergartenersList()
            ->where('group_id', $rangeId)
            ->first();
    }

    /**
     * Verify and auto-fix space calculations for all groups
     * Called from controllers to ensure data consistency
     */
    public function verifyAndFixSpaceData()
    {
        // For each group in this kindergarten
        $this->groupAgeRanges->each(function($group) {
            $groupId = $group->id;
            
            // Count actual kindergarteners in this group
            $actualCount = $this->Kindergarteners()
                ->where('group_id', $groupId)
                ->count();
            
            // Get current pivot data
            $pivotData = DB::table('kindergarten_group_age_range')
                ->where('kindergarten_id', $this->id)
                ->where('group_age_range', $groupId)
                ->first();
            
            if ($pivotData && $pivotData->space_filled != $actualCount) {
                // Mismatch detected! Auto-fix it
                \Log::warning('Space data mismatch detected and fixed', [
                    'kindergarten_id' => $this->id,
                    'group_id' => $groupId,
                    'old_space_filled' => $pivotData->space_filled,
                    'actual_count' => $actualCount,
                    'space_length' => $pivotData->space_length
                ]);
                
                DB::table('kindergarten_group_age_range')
                    ->where('kindergarten_id', $this->id)
                    ->where('group_age_range', $groupId)
                    ->update([
                        'space_filled' => $actualCount,
                        'space_free' => max(0, $pivotData->space_length - $actualCount)
                    ]);
            }
        });
        
        return $this;
    }
