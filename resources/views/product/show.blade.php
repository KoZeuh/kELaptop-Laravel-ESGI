@php
    $currentUser = auth()->user();
@endphp

@extends('layouts.app')

@section('content')
    <div class="container py-4 flex items-center gap-3 text-gray-200">
        <a href="{{route('home')}}" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="font-medium">Détails d'un produit</p>
    </div>

    <div class="container mx-auto text-gray-200">
        <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
            <div class="lg:col-span-3 lg:row-end-1">
                <div class="lg:flex lg:items-start">
                    <div class="lg:order-2 lg:ml-5">
                        <div class="max-w-xl overflow-hidden rounded-lg">
                            @foreach ($product->images as $image)
                                @if ($image->isPrimary == 1)
                                    <img src="{{ asset('storage/upload/images/products/' . $image->path) }}" class="h-full w-full max-w-full object-cover">
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-2 w-full lg:order-1 lg:w-32 lg:flex-shrink-0">
                        <div class="flex flex-row items-start lg:flex-col">
                            @foreach ($product->images as $image)
                                @if ($image->isPrimary == 0)
                                    <div class="flex-1 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center">
                                        <img src="{{ asset('storage/upload/images/products/' . $image->path) }}" class="h-full w-full object-cover" alt="">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
                <h1 class="sm: text-2xl font-bold sm:text-3xl">{{ $product->name }}</h1>

                @php
                    $avgRating = number_format($product->reviews()->avg('rating'), 1, '.', ',');
                @endphp

                <div class="mt-5 flex items-center">
                    <div class="flex items-center">
                        @for ($i = 0; $i < intval($avgRating); $i++)
                            <span class="text-yellow-500"><i class="fa-solid fa-star"></i></span>
                        @endfor
                    </div>

                    <p class="ml-2 text-sm font-medium">({{ $product->reviews->count() }} avis)</p>
                </div>

                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf

                    <h2 class="mt-8">Quantité</h2>
                    <div class="mt-3 flex select-none flex-wrap items-center gap-1">
                        <input type="number" name="quantity" class="w-20 border text-gray-800 rounded-lg px-4 py-2" min="1" max="{{$countInStock}}" value="1" required>
                    </div>

                    <div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
                        <div class="flex items-end">
                            <h1 class="text-3xl font-bold">{{ $product->price }}</h1>
                            <span class="text-base">/u</span>
                        </div>

                        <div class="px-5">
                            @if ($countInStock > 0)
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button type="submit" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-green-900 bg-none px-12 py-3 text-center text-base font-bold text-gray transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    Ajouter au panier
                                </button>
                            @else
                                <button type="hidden" class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>

                                    <div>
                                        <span class="font-medium">Cliquez ici pour être informé de la disponibilité</span>
                                    </div>
                                </button>
                            @endif
                        </div>
                    </div>
                </form>

                <div class="lg:col-span-3 mt-5 text-gray-200">
                    <nav class="flex gap-4">
                        <h2 class="text-lg font-medium">Détails du produit</h2>
                    </nav>

                    @if ($product->details == null)
                        <p>Aucun détails fourni..</p>
                    @else
                        @php
                            $details = json_decode($product->details, true);
                        @endphp

                        <table class="table-auto border-collapse w-full text-left text-sm mt-6">
                            @foreach($details as $key => $value)
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium text-capitalize">{{ $key }}:</th>
                                    <td class="py-2 px-4 border border-gray-300 text-capitalize">{{ $value }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>

            <div class="lg:col-span-3 text-gray-200">
                <div class="border-b border-gray-300">
                    <nav class="flex gap-4">
                        <h2 class="text-lg font-medium">Description</h2>
                    </nav>
                </div>

                <div class="mt-8 flow-root sm:mt-12">
                    <p class="mt-4">{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>



    @include('review.show')

    <div class="container pb-16 mt-5 text-gray-200">
        <h2 class="text-2xl font-medium uppercase mb-6">Produit(s) similaire(s)</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($similarProducts as $similarProduct)
                <div class="bg-white shadow rounded overflow-hidden group flex flex-col">
                    <div class="relative flex-shrink-0" style="height: 200px;"> <!-- Fixe la hauteur des images -->
                        <img src="{{ asset('storage/upload/images/products/' . $similarProduct->images()->first()->path) }}" class="h-full w-full object-cover"> <!-- Utilise object-cover pour maintenir les proportions -->
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ route('product.show', $similarProduct->id) }}"
                               class="text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                               title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
                    <div class="flex-grow p-4 flex flex-col"> <!-- Flex-grow pour prendre l'espace restant -->
                        <a href="{{ route('product.show', $similarProduct->id) }}" class="mb-2">
                            <h4 class="uppercase font-medium text-xl hover:text-primary transition truncate"> <!-- Truncate pour couper le texte long -->
                                {{ $similarProduct->name }}
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">{{ $similarProduct->price }} $</p>
                        </div>
                        <div class="flex flex-1 items-end justify-between"> <!-- Alignement des étoiles et avis en bas -->
                            <div class="flex gap-1 text-sm text-yellow-400">
                                @php
                                    $avgRating = number_format($similarProduct->reviews()->avg('rating'), 1, '.', ',');
                                @endphp
                                @for ($i = 0; $i < intval($avgRating); $i++)
                                    <span class="text-yellow-500"><i class="fa-solid fa-star"></i></span>
                                @endfor
                            </div>
                            <div class="text-xs">( {{ $similarProduct->reviews->count() }} avis )</div>
                        </div>
                    </div>
                    <a href="{{ route('product.show', $similarProduct->id) }}"
                       class="block w-full py-1 text-center bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Ajouter au panier</a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
