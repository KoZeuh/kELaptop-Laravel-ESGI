@extends('layouts.app')

@section('content')
    @php
        $currentUser = auth()->user();
    @endphp

    <section class="h-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Panier - {{ $currentUser->cartItems->count() }} article(s)</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($currentUser->cartItems as $item)
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                            <img src="/img/{{ $item->product->images()->first()->path }}" class="w-100" />
                                            <a href="{{ url('product/show', $item->product->id) }}">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <p><strong>{{ $item->product->name }}</strong></p>
                                        <p><strong>Marque:</strong> {{ $item->product->brand->name }}</p>
                                        <button type="button" class="btn btn-danger btn-sm me-1 mb-2" onclick="window.location.href='/cart/remove/{{ $item->product->id }}'">Retirer du panier</button>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <p><strong>Quantité:</strong> {{ $item->quantity }}</p>
                                        <p><strong>Prix : </strong> ${{ $item->product->price * $item->quantity }}</p>
                                    </div>
                                </div>

                                <hr class="my-4" />
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Résumé</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Produit(s)
                                    <span>{{ $currentUser->cartItems->count() }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Frais de livraison
                                    <span>Gratuit</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                    <strong>Montant total</strong>
                                    <strong>
                                        <p class="mb-0">(TVA non inclus)</p>
                                    </strong>
                                    </div>
                                    <span><strong>{{ $currentUser->cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) }} $</strong></span>
                                </li>
                            </ul>

                            <a href="{{ url('checkout') }}" class="btn btn-primary btn-block">Se rendre sur la page de paiement</a>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <p><strong>Date de livraison estimée</strong></p>
                            <p class="mb-0">Entre le {{ now()->addDays(3)->format('d/m/Y') }} et le {{ now()->addDays(7)->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <p><strong>Moyens de paiement acceptés</strong></p>
                            <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa"/>
                            <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" alt="American Express" />
                            <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard" />
                            <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/paypal.svg" alt="PayPal" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection