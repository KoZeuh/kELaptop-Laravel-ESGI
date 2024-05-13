@extends('layouts.app')

@section('content')
    <div class="contain py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
            <h2 class="text-2xl uppercase font-medium mb-1">Confirmation du mot de passe</h2>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="space-y-2">
                    <div>
                        <label for="password" class="text-gray mb-2 block">Mot de passe</label>
                        <input id="password" type="password" class="block w-full border border-gray-300 px-4 py-3 text-gray text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                @if (Route::has('password.request'))
                    <a class="text-primary" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif

                <div class="mt-4">
                    <button type="submit" class="block w-full py-2 text-center text-gray bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Confirmer</button>
                </div>
            </form>

            <p class="mt-4 text-center text-gray">Vous n'avez pas encore de compte ? <a href="{{ route('register') }}" class="text-primary">S'inscrire maintenant</a></p>
        </div>
    </div>
@endsection
