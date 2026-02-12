<?php

namespace App\Http\Controllers;

use App\Model\RegistrationText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationTextController extends Controller
{
    public function index()
    {
        $model = RegistrationText::first();
        if (!$model) {
            $model = new RegistrationText($this->defaults());
        }

        return view('registration-texts.index', [
            'model' => $model
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model = RegistrationText::firstOrNew();
        $model->fill($request->only(['title', 'subtitle', 'description']));
        $changes = $this->buildAuditChanges($model);
        $model->save();

        $this->logAudit('registration_text.update', RegistrationText::class, $model->id, 'Registration text updated', $changes);

        $message = [
            'flashType' => 'success',
            'flashMessage' => 'ტექსტი განახლდა წარმატებით'
        ];

        return back()->withInput()->withErrors([])->with($message);
    }

    private function defaults()
    {
        return [
            'title' => 'საბავშვო ბაღების გაერთიანება',
            'subtitle' => 'ბავშვის რეგისტრაცია',
            'description' => 'შეავსეთ განაცხადი ზუსტად და სრულად. სისტემა ავტომატურად გადამოწმებს აუცილებელ ველებს.'
        ];
    }
}
