@extends('layouts.app')

@section('content')
    <div class="contain py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
            <h2 class="text-2xl uppercase font-medium mb-1">Connexion</h2>
            <p class="text-gray-600 mb-6 text-sm">Bon retour !</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-2">
                    <div>
                        <label for="email" class="text-gray-600 mb-2 block">Adresse email</label>
                        <input id="email" type="email" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <div>
                        <label for="password" class="text-gray-600 mb-2 block">Mot de passe</label>
                        <input id="password" type="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input class="text-primary focus:ring-0 rounded-sm cursor-pointer" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="text-gray-600 ml-3 cursor-pointer">Se souvenir de moi</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-primary" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif
                </div>

                <div class="mt-4">
                    <button type="submit"
                        class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Se connecter</button>
                </div>
            </form>

            <!-- login with -->
            <div class="mt-6 flex justify-center relative">
                <div class="text-gray-600 uppercase px-3 bg-white z-10 relative">Ou se connecter avec</div>
                <div class="absolute left-0 top-3 w-full border-b-2 border-gray-200"></div>
            </div>
            <div class="mt-4 flex gap-4">
                <a href="{{route('google.login')}}" class="w-full py-2 text-center text-white bg-red-600 rounded uppercase font-roboto font-medium text-sm hover:bg-red-500">google</a>
            </div>
            <!-- ./login with -->

            <p class="mt-4 text-center text-gray-600">Vous n'avez pas encore de compte ? <a href="{{ route('register') }}" class="text-primary">S'inscrire maintenant</a></p>
        </div>
    </div>
    <!-- ./login -->
@endsection