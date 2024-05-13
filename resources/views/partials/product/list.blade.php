<div class="grid md:grid-cols-3 grid-cols-2 gap-6">
    @foreach ($products as $product)
        <div class="bg-gray-700 shadow-md overflow-hidden rounded hover:-translate-y-2 transition-all relative product" data-category="{{ $product->category->name }}" data-brand="{{ $product->brand->name }}" data-price="{{ $product->price }}">
            <div class="w-10 h-10 flex items-center justify-center rounded-full absolute top-3 right-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="18px" class="fill-gray-800 inline-block" viewBox="0 0 64 64">
                    <path d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z" data-original="#000000"></path>
                </svg>
            </div>

            <a href="{{ route('product.show', $product->id) }}" class="absolute inset-0 z-10"></a>
                <div class="w-11/12 h-[240px] p-4 overflow-hidden mx-auto aspect-w-16 aspect-h-8 md:mb-2 mb-4">
                    <img src="{{ asset('storage/upload/images/products/' . $product->images->first()->path) }}" class="h-full w-full object-contain" />
                </div>

                <div class="p-6">
                    <h3 class="text-lg font-extrabold">{{ $product->name }}</h3>
                    <h4 class="text-lg font-bold mt-2">{{ $product->price }} $</h4>
                    <p class=" text-sm mt-2">{{ $product->description }}</p>

                    <div class="flex space-x-2 mt-6">
                        @php
                            $avgRating = number_format($product->reviews()->avg('rating'), 1, '.', ',');
                            $starsCount = intval($avgRating) > 0 ? intval($avgRating) : 1;
                        @endphp

                        @for ($i = 0; $i < $starsCount; $i++)
                            <span class="text-yellow-500"><i class="fa-solid fa-star"></i></span>
                        @endfor

                        <span>({{ $avgRating }}/5 - basé sur {{ $product->reviews->count() }} avis)</span>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
