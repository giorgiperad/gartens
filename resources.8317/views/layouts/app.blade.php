<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'რეგისტრაცია') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    @stack('styles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/vendors/admin-lte-core.css') }}">


</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 hold-transition sidebar-mini layout-fixed">
  @include('partials.navigation')
  @include('partials.main-sidebar')
    <main class="content-wrapper bg-gray-50 dark:bg-gray-950 min-h-screen" id="app">
        @if (Session::has('flashMessage'))
          <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md rounded-xl p-4 mb-4 mx-4 mt-4 {{ Session::has('flashType') ? (session('flashType') === 'success' ? 'border-l-4 border-l-green-500' : (session('flashType') === 'danger' ? 'border-l-4 border-l-red-500' : (session('flashType') === 'warning' ? 'border-l-4 border-l-yellow-500' : 'border-l-4 border-l-indigo-500'))) : 'border-l-4 border-l-indigo-500' }}">
            <button type="button" class="float-right text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2"><i class="icon fas fa-check mr-2"></i> შეტყობინება!</h5>
            <p class="text-gray-700 dark:text-gray-300">{{ session('flashMessage') }}</p>
          </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 shadow-md rounded-xl p-4 mb-4 mx-4 mt-4">
                <ul class="list-disc list-inside text-red-700 dark:text-red-300">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
        @yield('content')
    </main>

 <!-- Scripts -->
 <script src="{{ mix('js/manifest.js') }}"></script>
 <script src="{{ mix('js/vendor.js') }}"></script>
 <script src="{{ mix('js/bootstrap.js') }}"></script>
 <script src="{{ mix('js/app.js') }}"></script>
 <script src="{{ mix('js/vendors/admin-lte-core.js') }}"></script>
 <script>window.jQuery = $</script>
 @stack('scripts')
</body>
</html>
