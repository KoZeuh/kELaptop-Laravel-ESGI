<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'kFruitables') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @php
            $currentPath = request()->path();
            $currentUser = auth()->user();
        @endphp
    </head>
    <body>
        <div id="app">
            <!--Main Navigation-->
            <header class="py-4 shadow-sm bg-white">
                <div class="container flex items-center justify-between">
                    <a href="{{url('/')}}">
                        <img src="/images/logo.svg" alt="Logo" class="w-32">
                    </a>

                    <div class="w-full max-w-xl relative flex">
                        <span class="absolute left-4 top-3 text-lg text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" name="search" id="search"
                            class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none hidden md:flex"
                            placeholder="search">
                        <button
                            class="bg-primary border border-primary text-white px-8 rounded-r-md hover:bg-transparent hover:text-primary transition hidden md:flex">Rechercher</button>
                    </div>

                    <div class="flex items-center space-x-4">
                        <a href="{{url('/checkout')}}" class="text-center text-gray-700 hover:text-primary transition relative">
                            <div class="text-2xl">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                            <div class="text-xs leading-3">Panier</div>
                            <div class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">@auth {{$currentUser->cartItems->count()}} @else 0 @endauth</div>
                        </a>
                        @auth
                            <a href="{{url('/profile')}}" class="text-center text-gray-700 hover:text-primary transition relative">
                                <div class="text-2xl">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <div class="text-xs leading-3">Mon compte</div>
                            </a>
                        @endauth
                    </div>
                </div>
            </header>
            <!-- ./header -->

            <!-- navbar -->
            <nav class="bg-gray-800">
                <div class="container flex">
                    <div class="flex items-center justify-between flex-grow md:pl-12 py-5">
                        <div class="flex items-center space-x-6">
                            <a href="{{url('/')}}" class="text-gray-200 hover:text-white transition">Accueil</a>
                            <a href="{{url('product/list')}}" class="text-gray-200 hover:text-white transition">Liste des produits</a>
                            <a href="#" class="text-gray-200 hover:text-white transition">A propos de nous</a>
                            <a href="#" class="text-gray-200 hover:text-white transition">Nous contacter</a>
                        </div>
                        @guest
                            <a href="{{route('login')}}" class="text-gray-200 hover:text-white transition">Se connecter/S'inscrire</a>
                        @endguest
                    </div>
                </div>
            </nav>
            <!-- ./navbar -->

            @if ($errors->any())
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>

                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Une erreur est survenue..</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-green-800 dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>

                    <span class="sr-only">Success</span>
                    <div>
                        <span class="font-medium">Succès!</span>
                        <p class="mt-1.5">{{session('success')}}</p>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>

                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Une erreur est survenue..</span>
                        <p class="mt-1.5">{{session('error')}}</p>
                    </div>
                </div>
            @endif


            <main class="py-4">
                @yield('content')
            </main>

            <!-- footer -->
            <footer class="bg-white pt-16 pb-12 border-t border-gray-100">
                <div class="container grid grid-cols-1 ">
                    <div class="col-span-1 space-y-4">
                        <img src="/images/logo.svg" alt="logo" class="w-30">
                        <div class="mr-2">
                            <p class="text-gray-500">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, hic?
                            </p>
                        </div>
                        <div class="flex space-x-5">
                            <a href="#" class="text-gray-400 hover:text-gray-500"><i
                                    class="fa-brands fa-facebook-square"></i></a>
                            <a href="#" class="text-gray-400 hover:text-gray-500"><i
                                    class="fa-brands fa-instagram-square"></i></a>
                            <a href="#" class="text-gray-400 hover:text-gray-500"><i
                                    class="fa-brands fa-twitter-square"></i></a>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <i class="fa-brands fa-github-square"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-2 grid grid-cols-2 gap-4">
                        <div class="grid grid-cols-2 gap-4 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Solutions</h3>
                                <div class="mt-4 space-y-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Marketing</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Analitycs</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Commerce</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Insights</a>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Support</h3>
                                <div class="mt-4 space-y-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Pricing</a>
                                    <!-- <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Documentation</a> -->
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Guides</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">API Status</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Solutions</h3>
                                <div class="mt-4 space-y-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Marketing</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Analitycs</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Commerce</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Insights</a>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Support</h3>
                                <div class="mt-4 space-y-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Pricing</a>
                                    <!-- <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Documentation</a> -->
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Guides</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">API Status</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- ./footer -->

            <!-- copyright -->
            <div class="bg-gray-800 py-4">
                <div class="container flex items-center justify-between">
                    <p class="text-white">&copy; TailCommerce - All Right Reserved</p>
                    <div>
                        <img src="/images/methods.png" alt="methods" class="h-5">
                    </div>
                </div>
            </div>
            <!-- ./copyright -->


            
        </div>
    </div>

</body>
</html>