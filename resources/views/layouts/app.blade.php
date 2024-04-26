<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @php
            $currentPath = request()->path();
            $currentUser = auth()->user();
        @endphp
    </head>

    <body>
        <div id="app">
            @include('partials.navbar')
            @include('partials.errors')

            <main class="py-4">
                @yield('content')
            </main>

            @include('partials.footer')
        </div>

        @if ($currentPath === 'product/list')
            @vite(['resources/js/product_filter.js'])
        @endif
    </body>
</html>