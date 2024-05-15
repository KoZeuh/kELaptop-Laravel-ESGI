@php
    $avgRating = number_format($product->reviews()->avg('rating'), 1, '.', ',');
@endphp

<section class=" relative text-gray-200">
    <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">
        <div class="w-full">
            <h2 class="font-manrope font-bold text-4xl text-gray-300 mb-8 text-center">L'avis de nos clients</h2>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-11 pb-11 border-b border-gray-100 max-xl:max-w-2xl max-xl:mx-auto">
                <div class="box flex flex-col gap-y-4 w-full ">
                    @for ($i = 6; $i > 1; $i--)
                        <div class="flex items-center w-full">
                            <p class="font-medium text-lg mr-0.5">{{$i - 1}}</p>

                            <span class="text-yellow-500"><i class="fa-solid fa-star"></i></span>

                            <p class="h-2 w-full sm:min-w-[278px] rounded-3xl bg-amber-50 ml-5 mr-3">
                                <span class="h-full w-[{{$i*10}}%] rounded-3xl bg-amber-400 flex"></span>
                            </p>

                            <p class="font-medium text-lg mr-0.5">{{ $product->reviews()->where('rating', $i-1)->count() }}</p>
                        </div>
                    @endfor
                </div>

                <div class="p-8 bg-amber-50 rounded-3xl flex items-center justify-center flex-col">
                    <h2 class="font-manrope font-bold text-5xl text-amber-400 mb-6">{{ $avgRating }}</h2>

                    <div class="flex items-center justify-center gap-2 sm:gap-6 mb-4">
                        @for ($i = 0; $i < intval($avgRating); $i++)
                            <span class="text-yellow-500"><i class="fa-solid fa-star"></i></span>
                        @endfor
                    </div>

                    <p class="font-medium text-xl leading-8 text-center text-gray-800">Basé sur {{ $product->reviews()->count() }} avis</p>
                </div>

                @auth
                    @if ($hasPurchased && $product->reviews()->where('user_id', auth()->user()->id)->count() == 0)
                        <button onclick="openModal('reviewModal')" class="bg-primary border border-primary px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">
                            <i class="fa-solid fa-star"></i> Laisser un avis
                        </button>
                    @endif
                @endauth
            </div>

            @foreach ($reviews as $review)
                <div class="pt-11 pb-8 border-b border-gray-100 max-xl:max-w-2xl max-xl:mx-auto">
                    <div class="flex items-center gap-3 mb-4">
                        @for ($i = 0; $i < $review->rating; $i++)
                            <span class="text-yellow-500"><i class="fa-solid fa-star"></i></span>
                        @endfor
                    </div>

                    <div class="flex sm:items-center flex-col min-[400px]:flex-row justify-between gap-5 mb-4">
                        <div class="flex items-center gap-3">
                            <img src="https://avatar.iran.liara.run/username?username={{$review->user->firstname}}+{{$review->user->lastname}}" class="w-8 h-8">
                            <h6 class="font-semibold text-lg leading-8 text-indigo-600 ">{{$review->user->firstname}} {{$review->user->lastname}}</h6>(<span class="font-normal text-lg leading-8 text-gray">{{$reviews->count()}} avis</span>)
                        </div>

                        <p class="font-normal text-lg leading-8">Posté le : {{$review->created_at->format('d/m/Y')}}</p>
                    </div>

                    <p class="font-normal text-lg leading-8 max-xl:text-justify">{{$review->review}}</p>
                </div>
            @endforeach

            <div class="flex justify-center mt-5">
                {!! $reviews->links() !!}
            </div>
        </div>
    </div>
</section>

@include('partials.modals.review')
