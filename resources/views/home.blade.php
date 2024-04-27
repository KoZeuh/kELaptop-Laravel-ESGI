@extends('layouts.app')

@section('content')
    <div id="default-carousel" class="relative rounded-lg overflow-hidden shadow-lg" data-carousel="static">
        <div class="relative md:h-96" data-carousel-inner>
            @for ($i = 0; $i < 3; $i++)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/pubs/{{$i + 1}}.webp" class="object-cover w-full">
                </div>
            @endfor
        </div>

        <div class="flex absolute bottom-5 left-1/2 z-30 -translate-x-1/2 space-x-2" data-carousel-indicators>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
        </div>


        <button type="button" class="flex absolute top-1/2 left-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition" data-carousel-prev>
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <button type="button" class="flex absolute top-1/2 right-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition" data-carousel-next>
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>


    <div class="container py-16">
        <div class="w-10/12 grid grid-cols-1 md:grid-cols-3 gap-6 mx-auto justify-center ">
            <div class="border border-gray-400 rounded-sm px-3 py-6 flex justify-center items-center gap-5 ">
                <img src="images/icons/delivery-van.svg" class="w-12 h-12 object-contain">
                <div class="text-gray-100">
                    <h4 class="font-medium capitalize text-lg">Livraison gratuite</h4>
                    <p class="text-sm">Peu importe le montant !</p>
                </div>
            </div>
            <div class="border border-gray-400 rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="images/icons/money-back.svg" class="w-12 h-12 object-contain">
                <div class="text-gray-100">
                    <h4 class="font-medium capitalize text-lg">Retour possible</h4>
                    <p class="text-sm">Jusqu'à 2 mois</p>
                </div>
            </div>
            <div class="border border-gray-400 rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="images/icons/service-hours.svg" class="w-12 h-12 object-contain">
                <div class="text-gray-100">
                    <h4 class="font-medium capitalize text-lg">24/7 Support</h4>
                    <p class="text-sm">Toujours là pour vous..</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="text-2xl font-medium text-gray-100 uppercase mb-6">Nos catégories</h2>
        <div class="grid grid-cols-3 gap-3">
            @foreach ($categories as $category)
                @if ($category->parent_id == null)
                    <div class="relative rounded-sm overflow-hidden group">
                        <img src="{{ asset('storage/upload/images/categories/'. $category->path_banner)}}" class="h-full">
                        <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">{{ $category->name }}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-100 text-center uppercase mb-6">Recommandé pour vous</h2>
        
        @include('partials.product.list')
    </div>
@endsection