@php
    $currentUser = auth()->user();
@endphp

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
        <p class="text-gray-600 font-medium">Mon profil</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">

        <!-- sidebar -->
        <div class="col-span-3">
            <div class="px-4 py-3 shadow flex items-center gap-4">
                <div class="flex-shrink-0">
                    <img src="/images/avatar.png" alt="profile"
                        class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                </div>
                <div class="flex-grow">
                    <p class="text-gray-600">Bonjour,</p>
                    <h4 class="text-gray-800 font-medium">{{$currentUser->firstname}}</h4>
                </div>
            </div>

            <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
                <div class="space-y-1 pl-8">
                    <a href="{{url('/profile')}}" class="relative hover:text-primary block font-medium transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-address-card"></i>
                        </span>
                        Gestion de mes informations
                    </a>
                    <a href="#" class="relative hover:text-primary block transition">
                        Changer mon mot de passe
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="{{url('/profile/orders-history')}}" class="relative text-primary block font-medium transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-solid fa-box-archive"></i>
                        </span>
                        Mon historique de commandes
                    </a>
                    <a href="#" class="relative hover:text-primary block transition">
                        Mes commentaires
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="{{url('/logout')}}" class="relative hover:text-primary block font-medium transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </span>
                        Se déconnecter
                    </a>
                </div>

            </div>
        </div>
        <!-- ./sidebar -->

        <!-- info -->
        <div class="col-span-9 shadow rounded px-6 pt-5 pb-7">
            <h4 class="text-lg font-medium capitalize mb-4">
                Historique de mes commandes
            </h4>

            <div class="mt-5">
                {{ $orders->links() }}
            </div>
            
            @foreach($orders as $order)
                <div class="main-box border border-gray-200 rounded-xl pt-6 mt-5">
                    <div
                        class="flex flex-col lg:flex-row lg:items-center justify-between px-6 pb-6 border-b border-gray-200">
                        <div class="data">
                            <p class="font-semibold text-base leading-7 text-black">N° de commande: <span class="text-indigo-600 font-medium">#{{$order->id}}</span></p>
                            <p class="font-semibold text-base leading-7 text-black mt-4">Statut de la commande: <span class="text-gray-400 font-medium">@if ($order->status == 'VALIDATED') <span class="text-green-400 font-medium">Commande validée</span> @else <span class="text-red-400 font-medium">En attente de confirmation du vendeur @endif</span></p>
                            <p class="font-semibold text-base leading-7 text-black mt-4">Date de paiement : <span class="text-gray-400 font-medium">{{$order->created_at}}</span></p>
                        </div>
                        <button class="rounded-full py-3 px-7 font-semibold text-sm leading-7 text-white bg-indigo-600 max-lg:mt-5 shadow-sm shadow-transparent transition-all duration-500 hover:bg-indigo-700 hover:shadow-indigo-400">Suivre votre commande

                        </button>
                    </div>

                    @foreach($order->items as $item)
                        <div class="w-full px-3 min-[400px]:px-6">
                            <div class="flex flex-col lg:flex-row items-center py-6 border-b border-gray-200 gap-6 w-full">
                                <div class="img-box">
                                    <img src="/images/products/{{$item->product->images->first()->path}}" class="h-20 w-20 transition-all duration-300 rounded-lg">
                                </div>

                                <div class="flex flex-row items-center w-full ">
                                    <div class="grid grid-cols-1 lg:grid-cols-2 w-full">
                                        <div class="flex items-center">
                                            <div class="">
                                                <h2 class="font-semibold text-xl leading-8 text-black mb-3">{{$item->product->name}}</h2>
                                                <div class="flex items-center "></div>
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
                                                    <p class="font-medium text-sm leading-7 text-black">Quantité
                                                    </p>
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
                    @endphp

                    <div class="w-full border-t border-gray-200 px-6 flex flex-col lg:flex-row items-center justify-between ">
                        <div class="flex flex-col sm:flex-row items-center max-lg:border-b border-gray-200">
                            <p class="font-medium text-lg text-gray-900 pl-6 py-3 max-lg:text-center">Paiement réalisé avec la carte <span class="text-gray-500">finissant par 8822</span></p>
                        </div>
                        <p class="font-semibold text-lg text-black py-6">Prix total: <span class="text-indigo-600"> {{$checkoutTotalAmount}} $</span></p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- ./info -->

    </div>
    <!-- ./wrapper -->
                              
@endsection