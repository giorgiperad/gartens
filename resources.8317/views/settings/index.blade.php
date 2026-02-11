@extends('layouts.app')

@section('content')

<?php

function hasObjectKey($arr, $keyName) {
  return (array_key_exists($keyName, $arr) && $arr[$keyName] && !is_null($arr[$keyName]));
}

?>

<div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
  <div class="mb-6">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white tracking-tight">მართვა</h1>
  </div>
  <section class="content">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
<div>        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl p-4 sm:p-6">
  {!! Form::model($model, ['route' => 'settings.learningStart']) !!}
                  <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-3">სწავლის დაწყება</h5>
<hr class="border-gray-200 dark:border-gray-700 mb-4"/>
                  <p class="text-gray-700 dark:text-gray-300">
                    @if ($canStart)
                    <div>
                          <button class="bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-lg shadow transition-all" type="submit">დაწყება</button>
                        </div>
                    @else სწავლის დაწყების ბრძანებით სარგებლობა შეგეძლებათ <b class="text-gray-900 dark:text-white">{{$permission['object']['start']}}</b> @endif
                  </p>
                  {!! Form::close() !!}
                </div>
</div>

<div>        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl p-4 sm:p-6">
  {!! Form::model($model, ['route' => 'settings.learningEnd']) !!}
                  <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-3">სწავლის დასრულება</h5>
<hr class="border-gray-200 dark:border-gray-700 mb-4"/>
                  <p class="text-gray-700 dark:text-gray-300">
                    @if ($canEnd)<div>
                         <button class="bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-lg shadow transition-all" type="submit">დასრულება</button>
                        </div>
                    @else სწავლის დასრულების ბრძანებით სარგებლობა შეგეძლებათ <b class="text-gray-900 dark:text-white">{{$permission['object']['end']}}</b> @endif
                    </p>
                    {!! Form::close() !!}
                </div>
</div>
</div>

  {!! Form::model($model, ['route' => 'settings.store']) !!}
  <input type="hidden" name="slug" value="basic">
  <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl">
      <div class="p-4 sm:p-6">
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
<div>        <div class="bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                  <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-3">რეგისტრაციის ჩართვა/გამორთვა</h5>
<hr class="border-gray-200 dark:border-gray-700 mb-4"/>
                  <p><div class="flex items-center">
                          <input class="w-4 h-4 text-indigo-700 border-gray-300 rounded focus:ring-indigo-700" type="checkbox" 
                            @if (hasObjectKey($model->object, 'isRegistrationStart')) {{'checked'}} @endif id="customCheckbox2" value="true" name="object[isRegistrationStart]">
                          <label for="customCheckbox2" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">@if (hasObjectKey($model->object, 'isRegistrationStart')) {{'ჩართული'}} @else {{'გამორთული'}} @endif</label>
                        </div></p>
                </div>
</div>
<div>        <div class="bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                  <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-3">პრიორიტეტების ჩართვა/გამორთვა</h5>
<hr class="border-gray-200 dark:border-gray-700 mb-4"/>
                  <p><div class="flex items-center">
                          <input class="w-4 h-4 text-indigo-700 border-gray-300 rounded focus:ring-indigo-700" type="checkbox" id="customCheckbox3" 
                           @if(hasObjectKey($model->object, 'isPrioritetiesStart')) {{'checked'}} @endif name="object[isPrioritetiesStart]" value="true">
                          <label for="customCheckbox3" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">@if (hasObjectKey($model->object, 'isPrioritetiesStart')) {{'ჩართული'}} @else {{'გამორთული'}} @endif</label>
                        </div></p>
                </div>
</div>
</div>


      <div class="mb-6">
                <label for="inputDescription" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">შეტყობინება რეგისტრაციის თარიღისთვის:</label>
                <textarea name="object[nottification]" id="inputDescription" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700" rows="4">
@if(hasObjectKey($model->object, 'isPrioritetiesStart')){{$model->object['nottification']}}@endif
                </textarea>
              </div>

      <button type="submit" class="w-full bg-indigo-700 hover:bg-indigo-800 text-white font-medium px-6 py-3 rounded-lg shadow transition-all">
        <i class="far fa-paper-plane mr-2"></i> გაგზავნა
      </button>
  </div>

</div>
{!! Form::close() !!}
  </section>
</div>
@endsection

@push('scripts')
<script>

let route = @json(route('settings.learning'));

let isEducationStart = document.querySelector('#isEducationStart');
let isEducationEnd = document.querySelector('#isEducationEnd');


isEducationStart.addEventListener('change', (event) => {
  if (event.target.checked) isEducationEnd.checked = false
  if (event.target.checked) document.querySelector('label[for="isEducationStart"]').innerHTML = 'დაწყებული'
  else document.querySelector('label[for="isEducationStart"]').innerHTML = 'გამორთული'
  document.querySelector('label[for="isEducationEnd"]').innerHTML = 'გამორთული'
});

isEducationEnd.addEventListener('change', (event) => {
  if (event.target.checked) isEducationStart.checked = false
  if (event.target.checked) document.querySelector('label[for="isEducationEnd"]').innerHTML = 'დასრულებული'
  else document.querySelector('label[for="isEducationEnd"]').innerHTML = 'დასრულებული'
  document.querySelector('label[for="isEducationStart"]').innerHTML = 'გამორთული'
})


  // fetch(route, {
  //   method: 'POST', // or 'PUT'
  //   headers: {
  //     'Content-Type': 'application/json',
  //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //   },
  //   body: JSON.stringify({ checked: event.target.checked }),
  // })
  // .then(response => response.json())
  // .then(data => {
  //   console.log('Success:', data);
  // })
  // .catch((error) => {
  //   console.error('Error:', error);
  // })

</script>
@endpush











