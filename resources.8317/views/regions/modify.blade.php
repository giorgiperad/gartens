@extends('layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
  <div class="mb-6">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white tracking-tight">რეგიონი</h1>
  </div>
    <section class="content">
     {!! Form::model($model, ['route' => 'regions.store']) !!}
     {!! Form::hidden('id', $model->id) !!}
       <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl">
      <div class="p-4 sm:p-6">
        <div class="flex flex-col lg:flex-row gap-6">
          <div class="flex-1 order-2 lg:order-1">
            <div class="mb-4">
             <div class="form-group">
			    {!! Form::label('name', 'რეგიონის დასახელება', ['class' => 'block text-sm font-semibold text-gray-900 dark:text-white mb-2']) !!}
			    {!! Form::text('name', $model->name, ['class' => 'w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700']) !!}
			  </div>
            </div>       
          </div>
          <div class="w-full lg:w-80 order-1 lg:order-2">
            <button onclick="location.href = '{{ route('regions.list') }}'" type="button" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-lg shadow transition-all mb-3">
        <i class="far fa-window-close mr-2"></i> გაუქმება
      </button>
      <button type="submit" class="w-full bg-indigo-700 hover:bg-indigo-800 text-white font-medium px-6 py-3 rounded-lg shadow transition-all">
        <i class="far fa-paper-plane mr-2"></i> გაგზავნა
      </button>
          </div>
        </div>        
      </div>
  </div>
     {!! Form::close() !!}

   
    </section>
</div>
@endsection

@push('scripts')
<script></script>
@endpush







