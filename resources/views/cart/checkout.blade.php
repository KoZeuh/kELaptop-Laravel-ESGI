@extends('layouts.app')

@section('content')
    @php
        $currentUser = auth()->user();
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Votre panier</span>
                    <span class="badge badge-secondary badge-pill">{{$currentUser->cartItems->count()}}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach ($currentUser->cartItems as $item)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{$item->product->name}} (x {{$item->quantity}})</h6>
                                <small class="text-muted">{{$item->product->description}}</small>
                            </div>
                            <span class="text-muted">${{$item->product->price * $item->quantity}}</span>
                        </li>
                    @endforeach

                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Code Promo</h6>
                            <small>KOZEUHDEV</small>
                        </div>
                        <span class="text-success">-$0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>{{ $currentUser->cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) }} $</strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Appliquer</button>
                        </div>
                    </div>
                </form>

                <button class="btn btn-primary btn-lg btn-block mt-3" type="submit">Valider la commande</button>
            </div>
            
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Adresse de facturation</h4>
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Prénom</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Nom de famille</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Addresse</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Addresse 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Pays</label>
                                <select class="custom-select d-block w-100" id="country" required="">
                                <option value="">Choisir...</option>
                                <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Code Postal</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required="">
                                <div class="invalid-feedback">
                                Zip code required.
                                </div>
                            </div>
                        </div>

                        <hr class="mb-4">

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>

                        <hr class="mb-4">

                        <h4 class="mb-3">Payment</h4>
                    </form>
            </div>
        </div>
    </div>
@endsection