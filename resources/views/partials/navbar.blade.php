<header class="py-4 shadow-sm bg-gray-400">
    <div class="container flex items-center justify-between">
        <a href="{{route('home')}}">
            <img src="/images/logo.svg" class="w-32">
        </a>

        <div class="w-full max-w-xl relative flex">
            <span class="absolute left-4 top-3 text-lg text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>

            <input type="text" name="search" id="search" class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none hidden md:flex" placeholder="search">
                <button class="bg-primary border border-primary text-white px-8 rounded-r-md hover:bg-transparent hover:text-primary transition hidden md:flex">Rechercher</button>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{route('cart.show')}}" class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>

                    <div class="text-xs leading-3">Panier</div>
                    <div class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">@auth {{$currentUser->cartItems->count()}} @else 0 @endauth</div>
                </a>

                @auth
                    <a href="{{route('profile.index')}}" class="text-center text-gray-700 hover:text-primary transition relative">
                        <div class="text-2xl">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="text-xs leading-3">Mon compte</div>
                    </a>

                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="text-center text-gray-700 hover:text-primary transition relative">
                            <div class="text-2xl">
                                <i class="fa-solid fa-sign-out"></i>
                            </div>
                            <div class="text-xs leading-3">Déconnexion</div>
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</header>

<nav class="bg-gray-600">
    <div class="container flex">
        <div class="flex items-center justify-between flex-grow md:pl-12 py-5">
            <div class="flex items-center space-x-6">
                <a href="{{route('home')}}" class="text-gray-200 hover:text-white transition">Accueil</a>
                <a href="{{route('product.list')}}" class="text-gray-200 hover:text-white transition">Liste des produits</a>
                <a href="{{route('home.about_us')}}" class="text-gray-200 hover:text-white transition">A propos de nous</a>
                <a href="{{route('home.contact_us')}}" class="text-gray-200 hover:text-white transition">Nous contacter</a>
            </div>

            @auth
                @hasanyrole(['seller', 'admin'])
                    <a href="{{url('/admin')}}" class="text-gray-200 hover:text-white transition">Administration</a>
                @endhasanyrole
            @else
                <a href="{{route('login')}}" class="text-gray-200 hover:text-white transition">Se connecter/S'inscrire</a>
            @endguest
        </div>
    </div>
</nav>