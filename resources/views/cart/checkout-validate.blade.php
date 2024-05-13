@php
    $currentUser = auth()->user();
@endphp

@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
        <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
            <div class="relative">
                <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </a>

                        <span class="font-semibold text-gray-200">Commande validée</span>
                    </li>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>

                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-600 text-xs font-semibold text-gray ring ring-gray-600 ring-offset-2" href="#">2</a>
                        <span class="font-semibold text-gray-200">En attente de confirmation du vendeur</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
        <div class="px-4 pt-8">
            <p class="text-xl font-medium">Résumé des produits commandés</p>
            <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                @foreach($order->items as $item)
                    <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                        <img class="m-2 h-24 w-28 rounded-md border object-cover object-center"  src="{{ asset('storage/upload/images/products/' . $item->product->images->first()->path) }}"/>
                            <div class="flex w-full flex-col px-4 py-4">
                                <span class="font-semibold">{{$item->product->name}} - x {{$item->quantity}}</span>
                                <p class="text-lg font-bold">{{$item->product->price * $item->quantity}} $ ({{$item->product->price}} $/u)</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                <p class="text-xl font-medium">Détails de la commande n°{{$order->id}}</p>
                    <div class="mb-5">
                        @php
                            $checkoutTotalAmount = $order->items->sum(function($item) { return $item->product->price * $item->quantity; });
                            $amountDiscount = 0;

                            if ($order->promoCode) {
                                $amountDiscount = ($checkoutTotalAmount * $order->promoCode->discount / 100);
                            }
                        @endphp
                        
                        <div class="mt-6 border-t border-b py-2">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-200">Sous-total</p>
                                <p class="font-semibold text-gray-200">{{ $checkoutTotalAmount}} $</p>
                            </div>

                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-200">Frais de livraison</p>
                                <p class="font-semibold text-gray-200">$0.00</p>
                            </div>

                            @if ($amountDiscount > 0)
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-200">Réduction ({{$order->promoCode->discount}} %) (Code : <u>{{$order->promoCode->code}})</p>
                                    <p class="font-semibold text-gray-200"></u>{{$amountDiscount}} $</p>
                                </div>
                            @endif
                        </div>
                        
                        <div class="mt-6 flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-200">Total</p>
                            <p class="text-2xl font-semibold text-gray-200">{{$checkoutTotalAmount - $amountDiscount}} $</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection