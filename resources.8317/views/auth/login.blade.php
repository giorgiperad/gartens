@extends('layouts.login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-950 px-4 py-8">
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl overflow-hidden w-full max-w-4xl">
        <div class="flex flex-col lg:flex-row">

            {{-- Left: Login form --}}
            <div class="w-full lg:w-7/12 p-6 sm:p-8 lg:p-10 order-2 lg:order-1">
                <div class="text-center mb-6">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white tracking-tight mb-2">{{ __('ავტორიზაცია') }}</h3>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">{{ __('შეიყვანეთ მონაცემები ანგარიშზე შესასვლელად') }}</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">{{ __('ელ.ფოსტა') }}</label>
                        <input id="email" type="email" 
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700 @error('email') border-red-500 @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="mt-1 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">{{ __('პაროლი') }}</label>
                        <input id="password" type="password" 
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-700 focus:border-indigo-700 @error('password') border-red-500 @enderror" 
                               name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="mt-1 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center">
                            <input class="w-4 h-4 text-indigo-700 border-gray-300 rounded focus:ring-indigo-700" type="checkbox" name="remember" id="remember" 
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="ml-2 text-sm text-gray-700 dark:text-gray-300" for="remember">
                                {{ __('დამახსოვრება') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-700 dark:text-indigo-400 hover:underline font-semibold" href="{{ route('password.request') }}">
                                {{ __('') }}
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="w-full bg-indigo-700 hover:bg-indigo-800 text-white font-medium px-6 py-3 rounded-lg shadow transition-all">
                        {{ __('შესვლა') }}
                    </button>
                </form>
            </div>

            {{-- Right: City badge --}}
            <div class="w-full lg:w-5/12 flex items-center justify-center bg-gray-50 dark:bg-gray-900 text-center p-6 sm:p-8 lg:p-10 order-1 lg:order-2">
                <div>
                    <img src="{{ asset('city-badge.png') }}" 
                         alt="City Badge" 
                         class="mx-auto mb-4 max-h-40 sm:max-h-48" 
                         style="max-height: 160px;">
                    <h5 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('') }}</h5>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">{{ __('ა(ა)იპ მცხეთის მუნიციპალიტეტის სკოლამდელი აღზრდის დაწესებულებათა გაერთიანება') }}</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
