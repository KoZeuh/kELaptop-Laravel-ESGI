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
                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-600 text-xs font-semibold text-white ring ring-gray-600 ring-offset-2" href="#">1</a>
                        <span class="font-semibold text-gray-900">Panier</span>
                    </li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">2</a>
                        <span class="font-semibold text-gray-500">Validation de paiement</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
            <div class="px-4 pt-8">
                <p class="text-xl font-medium">Résumé du panier</p>
                <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                    @if ($currentUser->cartItems->isEmpty())
                        <p class="text-lg font-medium">Votre panier est vide</p>
                    @else
                        @foreach($currentUser->cartItems as $item)
                            <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                                <a href="/product/show/{{$item->product->id}}"><img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="/images/products/{{$item->product->images->first()->path}}"/></a>
                                
                                <div class="flex w-full flex-col px-4 py-4">
                                    <span class="font-semibold">{{$item->product->name}} - <button type="button" onclick="window.location.href='/cart/remove/{{ $item->product->id }}'"><i class="fa-solid fa-trash text-red-500"></i></button></span> 
                                    <p class="text-lg font-bold">{{$item->product->price * $item->quantity}} $ ({{$item->product->price}} $/u)</p>

                                    <form action="{{url('/cart/updateQty')}}" method="post">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                        <input type="number" name="quantity" value="{{$item->quantity}}" min="0" max="{{App\Models\Stock::find($item->product->id)->quantity}}" class="w-10 border border-gray-200 rounded-sm px-2 py-1">

                                        <button type="submit" class="text-primary mx-3"><i class="fa-solid fa-check"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                @if (!$currentUser->cartItems->isEmpty())

                    <p class="mt-8 text-lg font-medium">Mode de livraison</p>

                    <div class="relative">
                        <input class="peer hidden" id="delivery_dhl" type="radio" name="delivery_dhl" />
                        <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                        <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="radio_1">
                            <img class="w-14 object-contain" src="/images/delivery/dhl.png"/>
                            <div class="ml-5">
                                <span class="mt-2 font-semibold">DHL</span>
                                <p class="text-slate-500 text-sm leading-6">Entre 2 et 4 jours ouvrés</p>
                            </div>
                        </label>
                    </div>

                    <div class="relative">
                        <input class="peer hidden" id="delivery_ups" type="radio" name="delivery_ups" />
                        <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                        <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="radio_2">
                            <img class="w-14 object-contain" src="/images/delivery/ups.png"/>
                            <div class="ml-5">
                                <span class="mt-2 font-semibold">UPS</span>
                                <p class="text-slate-500 text-sm leading-6">Entre 3 et 5 jours ouvrés</p>
                            </div>
                        </label>
                    </div>

                    <div class="relative">
                        <input class="peer hidden" id="delivery_fedex" type="radio" name="delivery_fedex" checked />
                        <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                        <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="radio_3">
                            <img class="w-14 object-contain" src="/images/delivery/fedex.png"/>
                            <div class="ml-5">
                                <span class="mt-2 font-semibold">FedEx</span>
                                <p class="text-slate-500 text-sm leading-6">Entre 4 et 6 jours ouvrés</p>
                            </div>
                        </label>
                    </div>

                    <form action="{{url('/cart/checkCoupon')}}" method="POST">
                        @csrf

                        <p class="mt-8 text-lg font-medium">Code promo</p>
                        <div class="flex">
                            <input name="coupon" id="coupon" type="text" class="w-3/4 border border-gray-200 rounded-md px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" required placeholder="Entrez votre code promo" />
                            <button class="w-1/4 rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Appliquer</button>
                        </div>
                    </form>
                @endif
            </div>

            <form action="{{url('/checkout-validate')}}" method="POST">
                @csrf
                
                <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                    <p class="text-xl font-medium">Détails de commande</p>
                    <div class="">
                        @if (!$currentUser->cartItems->isEmpty())
                            <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
                            <div class="relative">
                                <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" value="{{$currentUser->email}}" />
                                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                            </div>

                            <label for="firstname" class="mt-4 mb-2 block text-sm font-medium">Prénom & Nom</label>
                            <div class="flex">
                                <div class="relative w-7/12 flex-shrink-0">
                                    <input type="text" id="firstname" name="firstname" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" value="{{$currentUser->firstname}}" />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
                                            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
                                        </svg>
                                    </div>
                                </div>

                                <input type="text" id="lastname" name="lastname" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" value="{{$currentUser->lastname}}" />
                                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3"></div>
                            </div>

                            <label for="phone" class="mt-4 mb-2 block text-sm font-medium">Téléphone</label>
                            <div class="relative">
                                <input type="text" id="phone" name="phone" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" value="{{$currentUser->phone}}" />
                                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10V3m0 7v4m-6-4a9 9 0 0118 0m-9 4v5m0 0v5m0-5h6m-6 0H9" />
                                    </svg>
                                </div>
                            </div>

                            <label for="card-identity" class="mt-4 mb-2 block text-sm font-medium">Identité du propriétaire de la carte</label>
                            <div class="relative">
                                <input type="text" id="card-identity" name="card-identity" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" value="{{$currentUser->firstname}} {{$currentUser->lastname}}" />
                                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                </svg>
                                </div>
                            </div>

                            <label for="card-number" class="mt-4 mb-2 block text-sm font-medium">Informations de la carte</label>
                            <div class="flex">
                                <div class="relative w-7/12 flex-shrink-0">
                                    <input type="text" id="card-number" name="card-number" class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxx-xxxx-xxxx-xxxx" />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
                                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
                                        </svg>
                                    </div>
                                </div>

                                <input type="text" name="card-expiry" class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="MM/YY" />
                                <input type="text" name="card-cvc" class="w-1/6 flex-shrink-0 rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="CVC" />
                            </div>

                            <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Adresse de facturation</label>
                            <div class="flex flex-col sm:flex-row">
                                <div class="relative flex-shrink-0 sm:w-7/12">
                                    <input type="text" id="billing-address" name="billing-address" value="{{$currentUser->address}}" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Street Address" />
                                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                        <img class="h-4 w-4 object-contain" src="https://flagpack.xyz/_nuxt/4c829b6c0131de7162790d2f897a90fd.svg"/>
                                    </div>
                                </div>

                                <input value="{{$currentUser->zip}}" type="text" name="billing-zip" class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="ZIP" />
                                <input value="{{$currentUser->city}}" type="text" name="billing-city" class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="City" />
                            </div>

                            <label for="billing-country" class="mt-4 mb-2 block text-sm font-medium">Pays</label>
                            <input value="{{$currentUser->country}}" type="text" name="billing-country" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Country" />
                        @endif

                        @php
                            $cartTotalAmount = $currentUser->cartItems->sum(function($item) { return $item->product->price * $item->quantity; });
                            $amountWithDiscount = 0;
                            $promoDiscount = 0;

                            if (session('promoCode')) {
                                $promoCode = session('promoCode');

                                $promoDiscount = $promoCode->discount;
                                $promoCode = $promoCode->code;

                                $amountWithDiscount = ($cartTotalAmount * $promoDiscount / 100);
                            }
                        @endphp

                        <div class="mt-6 border-t border-b py-2">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">Sous-total</p>
                                <p class="font-semibold text-gray-900">{{ $cartTotalAmount}} $</p>
                            </div>

                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">Frais de livraison</p>
                                <p class="font-semibold text-gray-900">0.00 $</p>
                            </div>

                            @if ($amountWithDiscount > 0)
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900">Réduction ({{$promoDiscount}} %) (Code : <u>{{$promoCode}})</p>
                                    <p class="font-semibold text-gray-900"></u>{{$amountWithDiscount}} $ - <button type="button" onclick="window.location.href='/cart/removeCoupon'"><i class="fa-solid fa-trash text-red-500"></i></button></p>
                                </div>
                            @endif
                        </div>

                        <div class="mt-6 flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Total</p>
                            <p class="text-2xl font-semibold text-gray-900">{{$cartTotalAmount - ($cartTotalAmount * $promoDiscount / 100)}} $</p>
                        </div>
                    </div>

                    @if (!$currentUser->cartItems->isEmpty())
                        <button type="submit" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Passer commande</button>
                    @endif
                </div>
            </form>
    </div>
@endsection