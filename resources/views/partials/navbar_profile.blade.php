
<div class="container py-4 flex items-center gap-3">
    <a href="{{url('/')}}" class="text-primary text-base">
        <i class="fa-solid fa-house"></i>
    </a>

    <span class="text-sm text-gray-400">
        <i class="fa-solid fa-chevron-right"></i>
    </span>

    <p class="text-gray-600 font-medium">Mon profil</p>
</div>

<div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
    <div class="col-span-3">
        <div class="px-4 py-3 shadow flex items-center gap-4">
            <div class="flex-shrink-0">
                <img src="/images/avatar.png" class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
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
            </div>


            <div class="space-y-1 pl-8 pt-4">
                <a href="{{url('/profile/orders-history')}}" class="relative hover:text-primary block font-medium transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-solid fa-box-archive"></i>
                    </span>
                    Mon historique de commandes
                </a>
            </div>
        </div>
    </div>


