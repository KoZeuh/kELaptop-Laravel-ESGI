@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <aside class="col-md-3">
		
        <div class="card">
	        <article class="filter-group">
		        <div class="filter-content collapse show" id="collapse_1" style="">
			        <div class="card-body">
                <h6 class="title">Categories</h6>
                <ul class="list-menu">
                  @foreach($categories as $category)
                    @if($category->parent_id == null)
                      <h6 class="mt-2">{{ $category->name }}</h6>

                      <ul class="list-menu">
                        @foreach($categories as $subCategory)
                          @if($subCategory->parent_id == $category->id)
                            <li><a href="#">{{ $subCategory->name }}</a></li>
                          @endif
                        @endforeach
                      </ul>
                    @endif
                  @endforeach
                </ul>
			        </div>
		        </div>
	        </article>

          <article class="filter-group">
		        <div class="filter-content collapse show" id="collapse_2" style="">
			        <div class="card-body">
                <h6 class="title">Marques</h6>
                <ul class="list-menu">
                  @foreach($brands as $brand)
                    <li><a href="#">{{ $brand->name }}</a></li>
                  @endforeach
                </ul>
			        </div>
		        </div>
	        </article>

          <article class="filter-group">
            <header class="card-header"></header>
            <div class="filter-content collapse show" id="collapse_3" style="">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Min</label>
                    <input class="form-control" placeholder="$0" type="number">
                  </div>
                  <div class="form-group text-right col-md-6">
                    <label>Max</label>
                    <input class="form-control" placeholder="$1,0000" type="number">
                  </div>
                </div> <!-- form-row.// -->
                <button class="btn btn-block btn-primary mt-3">Appliquer</button>
              </div><!-- card-body.// -->
            </div>
          </article> <!-- filter-group .// -->
        </div>
	    </aside>

	    <main class="col-md-9">
        <div class="row">
          @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
              <div class="card">
                <a href="{{ url('product/show', $product->id) }}">
                  <img src="/img/{{$product->images->first()->path}}" class="card-img-top">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="small"><a href="{{ url('product/show', $product->id) }}" class="text-muted">{{ $product->category->name }}</a></p>
                      <P class="small text-muted">{{ $product->price }} $</P>
                    </div>

                    <div class="text-center mb-3">
                      <h5 class="mb-0">{{ $product->name }}</h5>
                    </div>

                    <div class="d-flex justify-content-center mb-2 text-warning">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star"></i>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          @endforeach
        </div>
	    </main>
	  </div>
  </div>
</div>
@endsection
