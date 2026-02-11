@extends('layouts.app')
@section('content')

<div class="bg-indigo-700 dark:bg-indigo-800 px-4 sm:px-6 lg:px-8 py-8 mb-8 rounded-b-2xl">
    <div class="container-fluid flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white tracking-tight mb-2">ზოგადი ინფორმაცია</h1>
            <p class="text-white/90 text-sm sm:text-base">მცხეთის მუნიციპალიტეტის სკოლამდელი აღზრდის დაწესებულებათა გაერთიანება</p>
        </div>
        <div>
            <img src="{{ asset('images/city-badge.png') }}" alt="City Emblem" class="h-16 sm:h-20 w-auto object-contain rounded-lg shadow-lg transition-transform duration-300 hover:scale-110">
        </div>
    </div>
</div>

<section class="content px-4 sm:px-6 lg:px-8">
    <div class="container-fluid">
        <!-- Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6">
            <a href="#" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl p-6 hover:shadow-lg transition-all duration-200 hover:-translate-y-1 block">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-300 mb-1">მომხმარებელი</p>
                        @if($user_count)
                            <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{$user_count}}</h3>
                        @else
                            <div class="h-8 w-16 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></div>
                        @endif
                    </div>
                    <div class="text-gray-600 dark:text-gray-400">
                        <i class="fas fa-users text-2xl sm:text-3xl"></i>
                    </div>
                </div>
            </a>
            <a href="{{ route('municipalities.list') }}" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl p-6 hover:shadow-lg transition-all duration-200 hover:-translate-y-1 block">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-300 mb-1">მუნიციპალიტეტი</p>
                        @if($municipality_count)
                            <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{$municipality_count}}</h3>
                        @else
                            <div class="h-8 w-16 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></div>
                        @endif
                    </div>
                    <div class="text-gray-600 dark:text-gray-400">
                        <i class="fas fa-city text-2xl sm:text-3xl"></i>
                    </div>
                </div>
            </a>
            <a href="{{ route('kindergarteners.index') }}" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl p-6 hover:shadow-lg transition-all duration-200 hover:-translate-y-1 block">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-300 mb-1">ბავშვი</p>
                        @if($kindergartner_count)
                            <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{$kindergartner_count}}</h3>
                        @else
                            <div class="h-8 w-16 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></div>
                        @endif
                    </div>
                    <div class="text-gray-600 dark:text-gray-400">
                        <i class="fas fa-child text-2xl sm:text-3xl"></i>
                    </div>
                </div>
            </a>
            <a href="{{ route('kindergartens.list') }}" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl p-6 hover:shadow-lg transition-all duration-200 hover:-translate-y-1 block">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-300 mb-1">ბაღი</p>
                        @if($kindergarten_count)
                            <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{$kindergarten_count}}</h3>
                        @else
                            <div class="h-8 w-16 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></div>
                        @endif
                    </div>
                    <div class="text-gray-600 dark:text-gray-400">
                        <i class="fas fa-school text-2xl sm:text-3xl"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Info Card -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl mb-6">
            <div class="px-4 sm:px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white"><i class="fas fa-info-circle mr-2 text-indigo-700 dark:text-indigo-400"></i> სისტემის ინფორმაცია</h2>
            </div>
            <div>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center px-4 sm:px-6 py-4 border-b border-gray-100 dark:border-gray-700 last:border-b-0">
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-1">სწავლის სტატუსი</h3>
                        <p class="text-sm text-gray-700 dark:text-gray-300">ამჟამინდელი მდგომარეობა</p>
                    </div>
                    <span class="px-3 py-1.5 rounded-full text-sm font-semibold text-white flex items-center gap-2 mt-2 sm:mt-0 {{ data_get($basic,'object.isLearningStart') ? 'bg-green-600' : 'bg-gray-500' }}">
                        <i class="fas fa-graduation-cap"></i>
                        {{ data_get($basic,'object.isLearningStart') ? 'მიმდინარე':'დასრულებული' }}
                    </span>
                </div>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center px-4 sm:px-6 py-4 border-b border-gray-100 dark:border-gray-700 last:border-b-0">
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-1">სწავლის დაწყების დრო</h3>
                        <p class="text-sm text-gray-700 dark:text-gray-300">პროცესის საწყისი თარიღი</p>
                    </div>
                    <span class="px-3 py-1.5 rounded-full text-sm font-semibold text-white bg-gray-500 mt-2 sm:mt-0">{{ data_get($date,'object.start') ?: 'მითითებული არ არის' }}</span>
                </div>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center px-4 sm:px-6 py-4 border-b border-gray-100 dark:border-gray-700 last:border-b-0">
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-1">სწავლის დასრულების დრო</h3>
                        <p class="text-sm text-gray-700 dark:text-gray-300">პროცესის საბოლოო თარიღი</p>
                    </div>
                    <span class="px-3 py-1.5 rounded-full text-sm font-semibold text-white bg-gray-500 mt-2 sm:mt-0">{{ data_get($date,'object.end') ?: 'მითითებული არ არის' }}</span>
                </div>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center px-4 sm:px-6 py-4">
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-1">პორტირების ნებართვა</h3>
                        <p class="text-sm text-gray-700 dark:text-gray-300">მონაცემების გადატანის უფლება</p>
                    </div>
                    <span class="px-3 py-1.5 rounded-full text-sm font-semibold text-white flex items-center gap-2 mt-2 sm:mt-0 {{ data_get($basic,'object.canPorting') ? 'bg-indigo-700' : 'bg-red-600' }}">
                        <i class="fas {{ data_get($basic,'object.canPorting') ? 'fa-check':'fa-times' }}"></i>
                        {{ data_get($basic,'object.canPorting') ? 'დიახ':'არა' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Export -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl p-4 sm:p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-3 sm:gap-4">
                <i class="fas fa-file-excel text-green-600 dark:text-green-400 text-2xl sm:text-3xl"></i>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">მონაცემების ექსპორტი</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300">აღსაზრდელების სრული ცხრილის ჩამოტვირთვა</p>
                </div>
            </div>
            <a href="{{ route('kindergarteners.export') }}" class="bg-indigo-700 hover:bg-indigo-800 text-white font-medium px-6 py-3 rounded-lg shadow transition-all inline-flex items-center gap-2">
                <i class="fas fa-download"></i> Excel ჩამოტვირთვა
            </a>
        </div>
    </div>
</section>

<div class="fixed bottom-8 right-8 bg-indigo-700 hover:bg-indigo-800 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg cursor-pointer transition-transform hover:scale-110" onclick="window.scrollTo({top:0,behavior:'smooth'})">
    <i class="fas fa-arrow-up"></i>
</div>
@endsection
