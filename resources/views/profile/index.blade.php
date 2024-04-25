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
                    <a href="{{url('/profile')}}" class="relative text-primary block font-medium transition">
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
                    <a href="{{url('/profile/orders-history')}}" class="relative hover:text-primary block font-medium transition">
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
                Informations personnelles
            </h4>
            <form action="{{url('/profile/save')}}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="firstName">Prénom</label>
                            <input type="text" name="firstName" id="firstName" class="input-box" value="{{$currentUser->first_name}}">
                        </div>
                        <div>
                            <label for="lastName">Nom de famille</label>
                            <input type="text" name="lastName" id="lastName" class="input-box" value="{{$currentUser->last_name}}">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="birthday">Date de naissance</label>
                            <input type="date" name="birthday" id="birthday" class="input-box" value="{{$currentUser->birthday}}">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="input-box" value="{{$currentUser->email}}">
                        </div>
                        <div>
                            <label for="phone">Numéro de téléphone</label>
                            <input type="text" name="phone" id="phone" class="input-box" value="{{$currentUser->phone}}">
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium">Sauvegarder les changements</button>
                </div>
            </form>
        </div>
        <!-- ./info -->

    </div>
    <!-- ./wrapper -->
@endsection