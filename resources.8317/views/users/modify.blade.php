@extends('layouts.app')

@section('content')

<div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
  <div class="mb-6">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white tracking-tight">მომხმარებელი</h1>
  </div>
    <section class="content">
     {!! Form::model($model, ['route' => 'users.store']) !!}
     {!! Form::hidden('id', $model->id) !!}
       <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl">
      <div class="p-4 sm:p-6">
        <div class="flex flex-col lg:flex-row gap-6">
          <div class="flex-1 order-2 lg:order-1">
            <div class="tab-content" id="custom-tabs-three-tabContent">
            
            <div class="mb-4">
                            <label for="name" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">{{ __('Name') }}</label>

                            <div>
                                {!! Form::text('name', $model->name, ['class' => 'w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700 @error('name') border-red-500 @enderror']) !!}

                                @error('name')
                                    <span class="mt-1 text-sm text-red-600 dark:text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">{{ __('E-Mail Address') }}</label>

                            <div>
                                {!! Form::email('email', $model->email, ['class' => 'w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700 @error('email') border-red-500 @enderror']) !!}

                                @error('email')
                                    <span class="mt-1 text-sm text-red-600 dark:text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700 @error('password') border-red-500 @enderror" name="password" >

                                @error('password')
                                    <span class="mt-1 text-sm text-red-600 dark:text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">{{ __('Confirm Password') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700" name="password_confirmation" >
                            </div>
                        </div>

            </div>       
          </div>
          <div class="w-full lg:w-80 order-1 lg:order-2">
            <button type="button" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-lg shadow transition-all mb-3">
        <i class="far fa-window-close mr-2"></i> Cancel
      </button>
      <button type="submit" class="w-full bg-indigo-700 hover:bg-indigo-800 text-white font-medium px-6 py-3 rounded-lg shadow transition-all">
        <i class="far fa-paper-plane mr-2"></i> Submit
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


