@php
    $currentUser = auth()->user();
@endphp

@extends('layouts.app')

@section('content')
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Validation de commande</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- wrapper -->
    <div class="container grid grid-cols-12 items-start pb-16 pt-4 gap-6">

        <div class="col-span-8 border border-gray-200 p-4 rounded">
            <h3 class="text-lg font-medium capitalize mb-4">Informations</h3>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="firstname" class="text-gray-600">Prénom <span class="text-primary">*</span></label>
                        <input type="text" name="firstname" id="firstname" class="input-box" value="{{$currentUser->firstname}}">
                    </div>
                    <div>
                        <label for="lastname" class="text-gray-600">Nom <span class="text-primary">*</span></label>
                        <input type="text" name="lastname" id="lastname" class="input-box" value="{{$currentUser->lastname}}">
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="address" class="text-gray-600">Adresse de livraison <span class="text-primary">*</span></label>
                        <input type="text" name="address" id="address" class="input-box" value="{{$currentUser->address}}">
                    </div>

                    <div>
                        <label for="city" class="text-gray-600">Ville <span class="text-primary">*</span></label>
                        <input type="text" name="city" id="city" class="input-box" value="{{$currentUser->city}}">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="phone" class="text-gray-600">Numéro de téléphone <span class="text-primary">*</span></label>
                        <input type="text" name="phone" id="phone" class="input-box" value="{{$currentUser->phone}}">
                    </div>
                    <div>
                        <label for="email" class="text-gray-600">Adresse email <span class="text-primary">*</span></label>
                        <input type="email" name="email" id="email" class="input-box" value="{{$currentUser->email}}">
                    </div>
                </div>
            </div>

        </div>

        <div class="col-span-4 border border-gray-200 p-4 rounded">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">Produits(s) : {{$currentUser->cartItems->count()}}</h4>
            <div class="space-y-2">
                @foreach ($currentUser->cartItems as $item)
                    <div class="flex justify-between">
                        <div>
                            <h5 class="text-gray-800 font-medium">{{$item->product->name}} <button onclick="window.location.href='/cart/remove/{{ $item->product->id }}'"><i class="fa-solid fa-trash text-red-500"></i></a></h5>
                        </div>
                        <p class="text-gray-600">
                            <form action="{{url('/cart/updateQty')}}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                <input type="number" name="quantity" value="{{$item->quantity}}" class="w-10 border border-gray-200 rounded-sm px-2 py-1">
                                <button type="submit" class="text-primary"><i class="fa-solid fa-check"></i></button>
                            </form>
                        </p>
                        <p class="text-gray-800 font-medium">{{$item->product->price * $item->quantity}} $</p>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                <p>Sous-total</p>
                <p>{{ $currentUser->cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) }} $</p>
            </div>

            <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                <p>Frais de livraison</p>
                <p>Gratuit</p>
            </div>

            <div class="flex justify-between text-gray-800 font-medium py-3 uppercas">
                <p class="font-semibold">Total</p>
                <p>{{ $currentUser->cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) }} $</p>
            </div>

            <div class="flex items-center mb-4 mt-2">
                <input type="checkbox" name="aggrement" id="aggrement"
                    class="text-primary focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
                <label for="aggrement" class="text-gray-600 ml-3 cursor-pointer text-sm">Je confirme avoir lu et accepte les <a href="#"class="text-primary">termes et conditions d'utilisation</a></label>
            </div>

            <a href="{{url('/')}}" class="block w-full py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium">Passer commande</a>
        </div>
    </div>
@endsection