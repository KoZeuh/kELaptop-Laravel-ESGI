@extends('layouts.app')

@section('content')
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="{{url('/')}}" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Détails d'un produit</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6">
        <div>
            <div class="grid grid-cols-5 gap-4 mt-4">
                @foreach ($product->images as $image)
                    @if ($image->isPrimary == 0)
                        <img src="/images/products/{{ $image->path }}" class="w-full cursor-pointer border border-primary">
                    @endif
                @endforeach
            </div>

            @foreach ($product->images as $image)
                @if ($image->isPrimary == 1)
                    <img src="/images/products/{{ $image->path }}" class="w-full">
                @endif
            @endforeach
        </div>

        <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{ $product->name }}</h2>
            <div class="flex items-center mb-4">
                <div class="text-xs text-gray-500 ml-3">{{$countOfOrdersProduct}} client(s) ont acheté ce produit</div>
            </div>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Disponibilité: </span>
                    
                    @if ($countInStock > 0)
                        <span class="text-green-600"><i class="fas fa-eye"></i> {{$countInStock}} en stock</span>
                    @else
                        <span class="text-red-600">RUPTURE DE STOCK</span>
                    @endif
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Marque: </span>
                    <span class="text-gray-600">{{$product->brand->name}}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Catégorie: </span>
                    <span class="text-gray-600">{{$product->category->name}}</span>
                </p>
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-xl text-primary font-semibold">{{$product->price}} $</p>
            </div>

            <div class="row mb-4 d-flex justify-content-center">
                @if ($countInStock > 0)
                    <form action="{{ url('/cart/addOrUpdate') }}" method="POST">
                        @csrf
                        <div class="col-md-4 col-6 mb-3 ">
                            <label class="mb-2 d-block">Quantité</label>
                            <div class="input-group mb-3" style="width: 170px;">
                                <input type="number" name="quantity" class="form-control text-center border border-secondary" min="1" max="{{$countInStock}}" value="1" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" required />
                            </div>
                        </div>

                        
                        <input type="hidden" name="product_id" value="{{$product->id}}">

                        <button type="submit" class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">
                            <i class="fa-solid fa-bag-shopping"></i> Ajouter au panier
                        </button>
                    </form>
                @else
                    <button class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>

                        <span class="sr-only">Info</span>

                        <div>
                            <span class="font-medium">Cliquez ici pour être informé de la disponibilité</span>
                        </div>
                    </button>
                @endif
            </div>
            

            <div class="flex gap-3 mt-4">
                <!-- description -->
                <div class="container pb-16">
                    <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">Détails du produit</h3>
                    <div class="w-3/5 pt-6">
                        <div class="text-gray-600">
                            {{$product->description}}
                        </div>

                        @if ($product->details == null)
                        <p>Aucun détails fourni..</p>
                        @else
                            @php
                                $details = json_decode($product->details, true);
                            @endphp

                            <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-6">
                                @foreach($details as $key => $value)
                                    <tr>
                                        <th class="py-2 px-4 border border-gray-300 w-40 font-medium">{{ $key }}:</th>
                                        <td class="py-2 px-4 border border-gray-300">{{ $value }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
                <!-- ./description -->
            </div>
        </div>
    </div>
    <!-- ./product-detail -->


    <!-- related product -->
    <div class="container pb-16 mt-5">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Produit(s) similaire(s)</h2>
        <div class="grid grid-cols-4 gap-6">

            @foreach ($similarProducts as $similarProduct)
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="/images/products/{{ $similarProduct->images()->first()->path }}" class="w-full">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ url('product/show', $similarProduct->id) }}"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="{{ url('product/show', $similarProduct->id) }}">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{ $similarProduct->name }}</h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">{{ $similarProduct->price }} $</p>
                        </div>
                        <div class="flex items-center">
                            @php
                                $randomStarsInt = random_int(1, 5); 
                                $randomCountReviews = random_int(1, 100);
                            @endphp

                            <div class="flex gap-1 text-sm text-yellow-400">
                                @for ($i = 0; $i < $randomStarsInt; $i++)
                                    <span><i class="fa-solid fa-star"></i></span>
                                @endfor
                            </div>

                            <div class="text-xs text-gray-500 ml-3">( {{ $randomCountReviews }} avis )</div>
                        </div>
                    </div>
                    <a href="{{ url('product/show', $similarProduct->id) }}"
                        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Ajouter au panier</a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- ./related product -->
@endsection