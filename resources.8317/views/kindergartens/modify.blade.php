@extends('layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
  <div class="mb-6">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white tracking-tight">ბაღი</h1>
  </div>
    <section class="content">
     {!! Form::model($model, ['route' => 'kindergartens.store']) !!}
     {!! Form::hidden('id', $model->id) !!}
       <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl">
      <div class="p-4 sm:p-6">
        <div class="flex flex-col lg:flex-row gap-6">
          <div class="flex-1 order-2 lg:order-1">
            <div class="mb-4">
             <div class="form-group mb-6">
			    {!! Form::label('name', 'ბაღის დასახელება', ['class' => 'block text-sm font-semibold text-gray-900 dark:text-white mb-2']) !!}
			    {!! Form::text('name', $model->name, ['class' => 'w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700']) !!}
			  </div>

       
<div>

  
            <nav class="w-100 border-b border-gray-200 dark:border-gray-700 mb-4">
              <div class="flex flex-wrap -mb-px" id="product-tab" role="tablist">
                
                @foreach ($data['group_ranges'] as $key => $range)
  <a class="px-4 py-2 text-sm font-medium border-b-2 transition-colors @if($loop->first){{ 'border-indigo-700 text-indigo-700 dark:text-indigo-400' }}@else{{ 'border-transparent text-gray-700 dark:text-gray-300 hover:text-indigo-700 dark:hover:text-indigo-400 hover:border-gray-300' }}@endif" id="tab-desc-{{$key}}" data-toggle="tab" href="#tab-{{$key}}" role="tab" aria-controls="tab-{{$key}}" aria-selected="@if ($loop->first) {{ 'true' }} @endif">{{$range}} - წლამდე</a>
  @endforeach

              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">

@foreach ($data['group_ranges'] as $key => $range)

@php
$ageRange = ($model->currentAge($key)) ? $model->currentAge($key)->toArray() : [];
@endphp

<div class="tab-pane fade @if($loop->first){{ 'active show' }}@endif" id="tab-{{$key}}" role="tabpanel" aria-labelledby="tab-desc-{{$key}}">
<div class="overflow-x-auto">
                    <table class="w-full">
                      <tbody class="divide-y divide-gray-200 dark:divide-gray-700"><tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white w-1/2">ადგილების რაოდენობა:</th>
                        <td class="px-4 py-3">
          {{ Form::text('range['.$key.'][space_length]', data_get($ageRange, 'pivot.space_length', 0), ['class' => 'w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700']) }}
      </td>
                      </tr>
                      <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">შევსებული ადგილი:</th>
                        <td class="px-4 py-3">{{ Form::text('range['.$key.'][space_filled]', data_get($ageRange, 'by_id.total', 0), ['class' => 'w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100', 'readonly' => true]) }}</td>
                      </tr>
                      <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900 dark:text-white">თავისუფალი ადგილი</th>
                        <td class="px-4 py-3">
                          <input type="text" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100" readonly 
                            name="range[{{$key}}][space_free]" value="{{data_get($ageRange, 'pivot.space_free', 0)}}">
                        </td>
                      </tr>
                    </tbody></table>
                  </div>
</div>

@endforeach
              
             
            </div>
          </div> 

            </div>       
          </div>
          <div class="w-full lg:w-80 order-1 lg:order-2">
           
            <div class="mb-4">
            {!! Form::select('municipality_id', $data['municipalities'], null, ['class' => 'w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700', 'placeholder' => 'აირჩიეთ რეგიონი']) !!}
            </div>
            <button onclick="location.href = '{{ route('kindergartens.list') }}'" type="button" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-lg shadow transition-all mb-3">
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







