@php
    $currentUser = auth()->user();
@endphp

@extends('layouts.app')

@section('content')
    @include('partials.navbar_profile')

    <div class="col-span-9 shadow rounded px-6 pt-5 pb-7">
        <h4 class="text-lg font-medium capitalize mb-4">Informations personnelles</h4>

        <form action="{{route('profile.save')}}" method="POST">
            @csrf

            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <label for="firstName">Prénom</label>
                    <input type="text" name="firstName" id="firstName" class="input-box" value="{{$currentUser->firstname}}">

                    <label for="lastName">Nom de famille</label>
                    <input type="text" name="lastName" id="lastName" class="input-box" value="{{$currentUser->lastname}}">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <label for="birthday">Date de naissance</label>
                    <input type="date" name="birthday" id="birthday" class="input-box" value="{{$currentUser->birthday}}">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input-box" value="{{$currentUser->email}}">

                    <label for="phone">Numéro de téléphone</label>
                    <input type="text" name="phone" id="phone" class="input-box" value="{{$currentUser->phone}}">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <label for="address">Adresse</label>
                    <input type="text" name="address" id="address" class="input-box" value="{{$currentUser->address}}">

                    <label for="city">Ville</label>
                    <input type="text" name="city" id="city" class="input-box" value="{{$currentUser->city}}">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <label for="zip">Code postal</label>
                    <input type="text" name="zip" id="zip" class="input-box" value="{{$currentUser->zip}}">

                    <label for="country">Pays</label>
                    <input type="text" name="country" id="country" class="input-box" value="{{$currentUser->country}}">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <label for="old-password">Ancien mot de passe</label>
                    <input type="password" name="old-password" id="old-password" class="input-box">

                    <label for="new-password">Nouveau mot de passe</label>
                    <input type="password" name="new-password" id="new-password" class="input-box">

                    <label for="confirm-password">Confirmer le mot de passe</label>
                    <input type="password" name="confirm-password" id="confirm-password" class="input-box">
                </div>

                <div class="mt-4">
                    <button type="submit" class="py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium">Sauvegarder les changements</button>
                </div>
            </form>
        </div>
    </div>
@endsection