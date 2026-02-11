@extends('layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
  <div class="mb-6">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white tracking-tight">მართვა</h1>
  </div>
	 
  <section class="content">
  	@if (!data_get($settings, 'basic.object.isLearningStart'))
  	<div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 shadow-md rounded-xl p-4 mb-6">
            <button type="button" class="float-right text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2"><i class="icon fas fa-check mr-2"></i> შეტყობინება!</h5>
            <p class="text-gray-700 dark:text-gray-300">იმისთვის რომ საიტმა დაიწყოს მუშაობა, შეიყვანეთ სასწავლო წლის დაწყების და დასრულების თარიღი!</p>
          </div>
    @endif
  {!! Form::model($model, ['route' => 'settings.date-store']) !!}
  <input type="hidden" name="slug" value="date">
  <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl">
      <div class="p-4 sm:p-6">
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div>
      <label for="validationTooltip01" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">დაწყება</label>
      <input readonly id="start" type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100" name="object[start]" value="{{data_get($settings, 'date.object.start')}}">
    </div>
    <div>
      <label for="validationTooltip02" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">დასრულება</label>
      <input readonly name="object[end]" type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100" id="end" value="{{data_get($settings, 'date.object.end')}}">
    </div>
</div>
<button class="bg-indigo-700 hover:bg-indigo-800 text-white font-medium px-6 py-3 rounded-lg shadow transition-all" type="submit">შენახვა</button>
      
  </div>

</div>
{!! Form::close() !!}
  </section>
</div>
@endsection

@push('scripts')
<script>
const start = document.getElementById('start');
const datepickerStart = new Datepicker(start, { disableTouchKeyboard: true });

const end = document.getElementById('end');
const datepickerEnd = new Datepicker(end, {});

</script>
@endpush














