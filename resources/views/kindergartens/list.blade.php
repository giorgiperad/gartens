@extends('layouts.app')

@section('content')

<?php

function color_picker ($num) {
  if (is_null($num) || $num === '') {
      return "secondary"; // Default color for empty/null values
  }
  
  switch (true) {
    case $num < 20:
        return "danger";
    case $num >= 20 && $num <= 37:
        return "warning";
    case $num > 37:
        return "success";
    default:
        return "secondary"; // Fallback
  }
}

?>

<div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">ბაღი</h1>
    </div><!-- /.col -->
   </div><!-- /.row -->
  </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">ბაღების ჩამონათვალი</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">          
          <button 
            type="submit" onclick="location.href = '{{ route('kindergartens.show') }}'" class="btn btn-sm btn-outline-success">
              <i class="fas fa-shield-alt"></i> დამატება
          </button>          
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table style="text-align:center;" class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>ID</th>
            <th>ბაღი</th>
            <th>მუნიციპალიტეტი</th>
            <th>ადგილი</th>
            <th>შევსებული</th>
            <th>თავისუფალი</th>
            <th>თარიღი</th>
            <th>მოქმედება</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($model as $item)
            @php 
              $calculater = collect($item->groupAgeRanges);
              $space_length = $calculater->sum('pivot.space_length');
              $space_filled = $calculater->sum('pivot.space_filled');
              $space_free = $calculater->sum('pivot.space_free');
              
              // Debug: detect zero-filled issues
              $hasIssue = false;
              $issueInfo = [];
              foreach ($item->groupAgeRanges as $group) {
                  if ($group->pivot->space_filled == 0 && $group->pivot->space_length > 0) {
                      $hasIssue = true;
                      $issueInfo[] = "Group {$group->id}: len={$group->pivot->space_length}, filled=0";
                  }
              }
            @endphp
           <tr @if($hasIssue) style="background-color: #fff3cd;" @endif>
            <td>{{$item->id}}</td>
            <td>
              {{$item->name}}
              @if($hasIssue)
                <br><small class="text-danger">⚠️ space_filled=0 detected!</small>
                <br><small class="text-muted">{{ implode(', ', $issueInfo) }}</small>
              @endif
            </td>
            <td>{{$item->municipality->name}}</td>
            <td><span class="badge badge-{{color_picker($space_length)}}">{{$space_length}}</span></td>
            <td><span class="badge badge-{{color_picker($space_filled)}}">{{$space_filled}}</span></td>
            <td><span class="badge badge-{{color_picker($space_free)}}">{{$space_free}}</span></td>
            <td>{{$item->created_at}}</td>
            <td>
              <button 
                type="button" 
                class="btn btn-sm btn-success" 
                onclick="location.href = '{{route('kindergartens.show', ['id' => $item->id])}}'">
                  <i class="fas fa-shield-alt"></i> რედაქტირება
              </button>
              <button 
                type="button" 
                class="btn btn-sm btn-danger"
                data-href="{{route('kindergartens.destroy', ['id' => $item->id])}}"
                onclick="nottify(event)">
                  <i class="fas fa-shield-alt"></i> წაშლა
              </button>
            </td>
           </tr>
          @endforeach          
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 <!-- /.card-footer-->
</div>
<!-- /.card -->
</section>
@endsection

@push('scripts')
<script></script>
@endpush








