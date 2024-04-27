@extends('layouts.app')

@section('content')
    <div class="container py-4 flex items-center gap-3">
        <a href="{{route('home')}}" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>

        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>

        <p class="text-white font-medium">Produits</p>
    </div>

    <div class="container grid md:grid-cols-4 grid-cols-2 gap-6 pt-4 pb-16 items-start">
        <div class="col-span-1 bg-gray-600 text-white px-4 pb-6 shadow rounded overflow-hiddenb hidden md:block">
            <div class="divide-y divide-gray-200 space-y-5">
                <div>
                    <h3 class="text-xl mb-3 uppercase font-medium">Catégories</h3>
                    <div class="space-y-2">
                        @foreach($categories as $category)
                            @if($category->parent_id == null)
                                <div class="flex items-center">
                                    <input type="checkbox" name="{{ $category->name }}" id="{{ $category->name }}"
                                        class="text-primary focus:ring-0 rounded-sm cursor-pointer category">
                                    <label for="{{ $category->name }}" class="ml-3 cusror-pointer">{{ $category->name }}</label>
                                    <div class="ml-auto text-sm">({{$category->products->count()}})</div>
                                </div>


                                @foreach($categories as $subCategory)
                                    @if($subCategory->parent_id == $category->id)
                                        <div class="ml-6 flex items-center">
                                            <input type="checkbox" name="{{ $subCategory->name }}" id="{{ $subCategory->name }}" class="category text-primary focus:ring-0 rounded-sm cursor-pointer">
                                            <label for="{{ $subCategory->name }}" class="ml-3 cusror-pointer">{{ $subCategory->name }}</label>
                                            <div class="ml-auto text-sm">({{$subCategory->products->count()}})</div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="pt-4">
                    <h3 class="text-xl mb-3 uppercase font-medium">Marques</h3>
                    <div class="space-y-2">
                        @foreach($brands as $brand)
                            <div class="flex items-center">
                                <input type="checkbox" name="{{ $brand->name }}" id="{{ $brand->name }}"
                                    class="brand text-primary focus:ring-0 rounded-sm cursor-pointer">
                                <label for="{{ $brand->name }}" class="ml-3 cusror-pointer">{{ $brand->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-3">
            <div class="flex justify-center mb-5">
                {!! $products->links() !!}
            </div>  

            @include('partials.product.list')

            <div class="flex justify-center mt-5">
                {!! $products->links() !!}
            </div>  
        </div>
    </div>
@endsection

@vite(['resources/js/product_filter.js'])