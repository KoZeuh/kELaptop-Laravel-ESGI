@php
    $currentUser = auth()->user();
@endphp

@extends('layouts.app')

@section('content')
    @include('partials.navbar_profile')

    <div class="col-span-9 shadow rounded px-6 pt-5 pb-7">
        <h4 class="text-lg font-medium mb-4 text-gray-200">Historique de mes commandes</h4>
        <div class="mt-5">{{ $orders->links() }}</div>

        @foreach($orders as $order)
            <div class="main-box border border-gray-200 rounded-xl pt-6 mt-5">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between px-6 pb-6 border-b border-gray-200">
                    <div class="data">
                        <p class="font-semibold text-base leading-7 text-black">N° de commande: <span class="text-indigo-600 font-medium">#{{$order->id}}</span></p>
                        <p class="font-semibold text-base leading-7 text-black mt-4">Statut de la commande: <span class="text-gray-200 font-medium">@if ($order->status == 'COMPLETED') <span class="text-green-400 font-medium">Commande validée</span> @else <span class="text-red-400 font-medium">En attente de confirmation du vendeur @endif</span></p>
                        <p class="font-semibold text-base leading-7 text-black mt-4">Date de paiement : <span class="text-gray-200 font-medium">{{$order->created_at}}</span></p>
                    </div>

                    <button class="rounded-full py-3 px-7 font-semibold text-sm leading-7 text-gray bg-indigo-600 max-lg:mt-5 shadow-sm shadow-transparent transition-all duration-500 hover:bg-indigo-700 hover:shadow-indigo-400">Suivre votre commande</button>
                </div>

                @foreach($order->items as $item)
                    <div class="w-full px-3 min-[400px]:px-6">
                        <div class="flex flex-col lg:flex-row items-center py-6 border-b border-gray-200 gap-6 w-full">
                            <div class="img-box">
                                <img src="{{ asset('storage/upload/images/' . $item->product->images->first()->path) }}" class="h-20 w-20 transition-all duration-300 rounded-lg">
                            </div>

                            <div class="flex flex-row items-center w-full ">
                                <div class="grid grid-cols-1 lg:grid-cols-2 w-full">
                                    <div class="flex items-center">
                                        <div>
                                            <h2 class="font-semibold text-xl leading-8 text-black mb-3">{{$item->product->name}}</h2>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-5">
                                        <div class="col-span-5 lg:col-span-1 flex items-center max-lg:mt-3">
                                            <div class="flex gap-3 lg:block">
                                                <p class="font-medium text-sm leading-7 text-black">Prix</p>
                                                <p class="lg:mt-4 font-medium text-sm leading-7 text-indigo-600">{{$item->product->price * $item->quantity}} $</p>
                                            </div>
                                        </div>

                                        <div class="col-span-5 lg:col-span-2 flex items-center max-lg:mt-3 ">
                                            <div class="flex gap-3 lg:block">
                                                <p class="font-medium text-sm leading-7 text-black">Quantité</p>
                                                <p class="font-medium text-sm leading-6 whitespace-nowrap py-0.5 px-3 rounded-full lg:mt-3 bg-emerald-50 text-emerald-600">{{$item->quantity}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @php
                    $checkoutTotalAmount = $order->items->sum(function($item) { return $item->product->price * $item->quantity; });

                    $amountDiscount = 0;

                    if ($order->promoCode) {
                        $amountDiscount = ($checkoutTotalAmount * $order->promoCode->discount / 100);
                    }
                @endphp

                @if ($amountDiscount > 0)
                    <div class="w-full px-6 flex flex-col lg:flex-row items-center justify-between">
                        <div class="flex flex-col sm:flex-row items-center max-lg:border-b border-gray-200">
                            <p class="font-medium text-lg text-gray-200 pl-6 py-3 max-lg:text-center">Réduction ({{$order->promoCode->discount}} %) (Code : <u>{{$order->promoCode->code}})</u></p>
                        </div>

                        <p class="font-semibold text-lg text-black py-6">Montant de la réduction: <span class="text-indigo-600"> {{$amountDiscount}} $ </span></p>

                    </div>
                @endif

                <div class="w-full border-t border-gray-200 px-6 flex flex-col lg:flex-row items-center justify-between ">
                    <div class="flex flex-col sm:flex-row items-center max-lg:border-b border-gray-200">
                        <p class="font-medium text-lg text-gray-200 pl-6 py-3 max-lg:text-center">Paiement réalisé avec la carte <span class="text-gray-200">finissant par 8822</span></p>
                    </div>

                    <p class="font-semibold text-lg text-black py-6">@if ($amountDiscount > 0) Sous-total: <span class="text-indigo-600">{{$checkoutTotalAmount}} $</span><br> @endif Prix total: <span class="text-indigo-600"> {{$checkoutTotalAmount - $amountDiscount}} $</span></p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
