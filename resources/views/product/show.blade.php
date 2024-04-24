@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-5">
                    <div class="d-flex justify-content-center mb-3">
                        @foreach ($product->images as $image)
                            @if ($image->isPrimary == 0)
                                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="/img/{{ $image->path }}" class="item-thumb">
                                    <img width="60" height="60" class="rounded-2" src="/img/{{ $image->path }}" />
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        @foreach ($product->images as $image)
                            @if ($image->isPrimary == 1)
                                <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="/img/{{ $image->path }}">
                                    <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="/img/{{ $image->path }}" />
                                </a>
                            @endif
                        @endforeach
                    </div>
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{ $product->name }}
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">4.5</span>
                            </div>
                            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>{{$countOfOrdersProduct}} commande(s)</span>
                            @if ($countInStock > 0)
                                <span class="ms-3 text-success"><i class="fas fa-eye"></i> {{$countInStock}} en stock</span>
                            @else
                                <span class="text-danger ms-2">RUPTURE DE STOCK</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <span class="h5">$ {{ $product->price }}</span>
                            <span class="text-muted">/u</span>
                        </div>

                        <div class="row">
                            <dt class="col-3">Catégorie:</dt>
                            <dd class="col-9">{{ $product->category->name }}</dd>

                            <dt class="col-3">Marque :</dt>
                            <dd class="col-9">{{ $product->brand->name }}</dd>
                        </div>

                        <hr />

                        <form action="{{ url('/cart/addOrUpdate') }}" method="POST">
                            @csrf
                            
                            <div class="row mb-4 d-flex justify-content-center">
                                <div class="col-md-4 col-6 mb-3 ">
                                    <label class="mb-2 d-block">Quantité</label>
                                    <div class="input-group mb-3" style="width: 170px;">
                                        <input type="number" name="quantity" class="form-control text-center border border-secondary" min="1" max="{{$countInStock}}" value="1" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" required />
                                    </div>
                                </div>

                                @if ($countInStock > 0)
                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                    <button type="submit" class="m-3 btn btn-primary shadow-0">
                                        <i class="me-1 fa fa-shopping-basket"></i> Ajouter au panier
                                    </button>
                                @else
                                    <a href="#" class="mt-3 btn btn-danger shadow-0"> Etre alerté de la disponibilité </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>
    <!-- content -->

    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-8 mb-4">
                    <div class="border rounded-2 px-3 py-2 bg-white">
                        <!-- Pills navs -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Specification</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Warranty info</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">Shipping info</a>
                            </li>
                        </ul>
                        <!-- Pills navs -->
                        <!-- Pills content -->
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                <p>
                                    {{ $product->description }}
                                </p>

                                <h5 class="mt-3">Technical specifications</h5>
                                @if ($product->details == null)
                                    <p>Aucun détails fourni..</p>
                                @else
                                    @php
                                        $details = json_decode($product->details, true);
                                    @endphp

                                    <table class="table border mt-3 mb-2">
                                        @foreach($details as $key => $value)
                                            <tr>
                                                <th class="py-2">{{ $key }}:</th>
                                                <td class="py-2">{{ $value }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>
                        <!-- Pills content -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="px-0 border rounded-2 shadow-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Produit(s) similaire(s)</h5>
                                @foreach ($similarProducts as $similarProduct)
                                    <a href="{{ url('product/show', $similarProduct->id) }}">
                                        <div class="d-flex mb-3">
                                            <div>
                                                <img src="/img/{{ $similarProduct->images()->first()->path }}" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                            </div>
                                            <div class="info">
                                                <div class="nav-link mb-1">
                                                    <p>{{ $similarProduct->name }}</p>
                                                </div>
                                                <strong class="text-dark">{{ $similarProduct->price }} $</strong>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection