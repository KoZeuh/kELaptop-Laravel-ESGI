@extends('layouts.app')

@section('content')
    <section class="py-14 lg:py-24 relative text-gray-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-9">
                <div class="img-box">
                    <img src="https://pagedone.io/asset/uploads/1702034769.png"
                        class="max-lg:mx-auto">
                </div>
                <div class="lg:pl-[100px] flex items-center">
                    <div class="data w-full">
                        <h2
                            class="font-manrope font-bold text-4xl lg:text-5xl mb-9 max-lg:text-center relative">
                            À propos de nous</h2>
                        <p class="font-normal text-xl leading-8 max-lg:text-center max-w-2xl mx-auto">
                            Animés par une passion pour l'expérience utilisateur fluide, nous avons méticuleusement élaboré notre plateforme pour renforcer votre expérience de navigation sur notre site.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 lg:py-24 relative text-gray-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-9">
                <div class="lg:pr-24 flex items-center">
                    <div class="data w-full">
                        <img src="https://pagedone.io/asset/uploads/1702034785.png"
                            class="block lg:hidden mb-9 mx-auto">
                        <h2 class="font-manrope font-bold text-4xl lg:text-5xl mb-9 max-lg:text-center">Créatifs depuis 2005</h2>
                        <p class="font-normal text-xl leading-8 max-lg:text-center max-w-2xl mx-auto">
                            Pagedone n'est pas seulement une collection de composants et de directives ; c'est une philosophie. Nous allons au-delà de l'esthétique en priorisant l'accessibilité, l'évolutivité et l'utilisabilité. Chaque élément, du plus petit détail à la mise en page la plus impressionnante, est minutieusement conçu pour améliorer la fonctionnalité et augmenter la satisfaction des utilisateurs.
                        </p>
                    </div>
                </div>
                <div class="img-box">
                    <img src="https://pagedone.io/asset/uploads/1702034785.png"
                        class="hidden lg:block">
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 text-gray-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-manrope text-4xl text-center font-bold mb-14">Nos résultats en chiffres</h2>
            <div class="flex flex-col gap-5 xl:gap-8 lg:flex-row lg:justify-between">
                <div
                    class="w-full max-lg:max-w-2xl mx-auto lg:mx-0 lg:w-1/3 p-6 rounded-2xl shadow-md bg-gray-600">
                    <div class="flex gap-5">
                        <div class="font-manrope text-2xl font-bold text-indigo-600">
                            240%
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-semibold mb-2">Croissance de l'entreprise</h4>
                            <p class="text-xs leading-5">Suivez le remarquable parcours de croissance de notre entreprise alors que nous continuons d'innover et de viser toujours plus haut.
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full max-lg:max-w-2xl mx-auto lg:mx-0 lg:w-1/3 p-6 rounded-2xl shadow-md bg-gray-600">
                    <div class="flex gap-5">
                        <div class="font-manrope text-2xl font-bold text-indigo-600">
                            175+
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-semibold mb-2">Membres de l'équipe</h4>
                            <p class="text-xs leading-5">Nos membres talentueux sont le moteur de Pagedone et les piliers de notre succès.</p>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full max-lg:max-w-2xl mx-auto lg:mx-0 lg:w-1/3 p-6 rounded-2xl shadow-md bg-gray-600">
                    <div class="flex gap-5">
                        <div class="font-manrope text-2xl font-bold text-indigo-600">
                            625+
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-semibold mb-2">Projets réalisés</h4>
                            <p class="text-xs leading-5">Nous avons mené à bien plus de 625 projets à travers le monde et notre compteur ne cesse de s'accroître.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
