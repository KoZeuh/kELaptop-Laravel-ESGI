@extends('layouts.app')

@section('content')
    <div class="contain py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden bg-gray-600 text-gray-200">
            <h2 class="text-2xl uppercase font-medium mb-1">Récupération du compte</h2>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">


                <div class="space-y-2">
                    <div>
                        <label for="email" class="mb-2 block">Adresse email</label>
                        <input id="email" type="email" class="block w-full border border-gray-300 px-4 py-3 text-gray-800 text-sm rounded focus:ring-0 focus:border-primary @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <div>
                        <label for="password" class="text-gray mb-2 block">Mot de passe</label>
                        <input id="password" type="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-800 text-sm rounded focus:ring-0 focus:border-primary @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label for="password-confirm" class="text-gray mb-2 block">Mot de passe</label>
                        <input id="password-confirm" type="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-800 text-sm rounded focus:ring-0 focus:border-primary @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="block w-full py-2 text-center text-gray bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Envoyer</button>
                </div>
            </form>

            <p class="mt-4 text-center">Vous n'avez pas encore de compte ? <a href="{{ route('register') }}" class="text-green-600">S'inscrire maintenant</a></p>
        </div>
    </div>
@endsection
