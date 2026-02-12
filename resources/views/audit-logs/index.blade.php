@extends('layouts.app')

@section('content')
@php
  $actionLabels = [
    'kindergartener.create' => 'ბავშვის დამატება',
    'kindergartener.update' => 'ბავშვის განახლება',
    'kindergartener.delete' => 'ბავშვის წაშლა',
    'kindergartener.bulk_action' => 'ბავშვებზე ჯგუფური მოქმედება',
    'user.update' => 'მომხმარებლის განახლება',
    'user.delete' => 'მომხმარებლის წაშლა',
    'settings.update' => 'პარამეტრების განახლება',
    'settings.date' => 'თარიღის პარამეტრები',
    'settings.learningStart' => 'სწავლის დაწყება',
    'settings.learningEnd' => 'სწავლის დასრულება',
    'settings.learning' => 'სწავლის პროცესის შესრულება',
    'registration_text.update' => 'რეგისტრაციის ტექსტის განახლება'
  ];

  $fieldLabels = [
    'kids_first_name' => 'ბავშვის სახელი',
    'kids_last_name' => 'ბავშვის გვარი',
    'kids_personal_number' => 'ბავშვის პირადი ნომერი',
    'mother_personal_number' => 'დედის პირადი ნომერი',
    'father_personal_number' => 'მამის პირადი ნომერი',
    'mother_first_name' => 'დედის სახელი',
    'mother_last_name' => 'დედის გვარი',
    'father_first_name' => 'მამის სახელი',
    'father_last_name' => 'მამის გვარი',
    'mobile_number' => 'მობილურის ნომერი',
    'email' => 'ელ. ფოსტა',
    'municipality_id' => 'მუნიციპალიტეტი',
    'kindergarten_id' => 'ბაღი',
    'group_id' => 'ჯგუფი',
    'priority_id' => 'პრიორიტეტი',
    'has_permission' => 'დადასტურება',
    'active_status_id' => 'სტატუსი',
    'title' => 'სათაური',
    'subtitle' => 'ქვესათაური',
    'description' => 'აღწერა',
    'isRegistrationStart' => 'რეგისტრაცია',
    'isPrioritetiesStart' => 'პრიორიტეტები',
    'canPorting' => 'პორტირების ნებართვა',
    'isLearningStart' => 'სწავლის სტატუსი'
  ];
@endphp
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">აუდიტის ჟურნალი</h1>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="card">
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>თარიღი</th>
            <th>მომხმარებელი</th>
            <th>ქმედება</th>
            <th>ცვლილება</th>
            <th>IP</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($logs as $log)
            <tr>
              <td>{{ $log->created_at }}</td>
              <td>{{ $log->user ? $log->user->name : '-' }}</td>
              <td>{{ $actionLabels[$log->action] ?? $log->action }}</td>
              <td>
                @if ($log->changes)
                  <div class="audit-changes">
                    @foreach ($log->changes as $key => $value)
                      @php
                        $label = $fieldLabels[$key] ?? $key;
                        $renderValue = function ($val) {
                          if (is_bool($val)) {
                            return $val ? 'დიახ' : 'არა';
                          }
                          if (is_array($val)) {
                            return json_encode($val, JSON_UNESCAPED_UNICODE);
                          }
                          return $val === null || $val === '' ? '-' : $val;
                        };
                      @endphp
                      @if (is_array($value) && array_key_exists('old', $value) && array_key_exists('new', $value))
                        <div>{{ $label }} {{ $renderValue($value['old']) }} - შეიცვალა {{ $renderValue($value['new']) }}</div>
                      @else
                        <div>{{ $label }} - შეიცვალა {{ $renderValue($value) }}</div>
                      @endif
                    @endforeach
                  </div>
                @else
                  -
                @endif
              </td>
              <td>{{ $log->ip }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center text-muted">ჩანაწერები ჯერ არ არსებობს</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      {{ $logs->links() }}
    </div>
  </div>
</section>
@endsection
