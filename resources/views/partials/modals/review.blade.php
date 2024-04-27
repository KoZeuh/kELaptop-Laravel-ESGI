<div id="reviewModal" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
    <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
        <div class="flex justify-end p-2">
            <button onclick="closeModal('reviewModal')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="p-6 pt-0 text-center">
            <h6 class="text-lg font-medium mb-4">Laisser un avis sur : <span class="text-primary">{{$product->name}}</span></h6>

            <form action="{{ route('product.postReview') }}" method="POST">
                @csrf

                <input type="hidden" name="product_id" value="{{$product->id}}">

                <div class="mt-4">
                    <label for="rating" class="text-gray-600">Note</label>

                    <select name="rating" id="rating" class="w-full border border-gray-300 rounded-lg p-2 mt-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>

                <div class="mt-4">
                    <label for="review" class="text-gray-600">Votre avis</label>

                    <textarea name="review" id="review" class="w-full border border-gray-300 rounded-lg p-2 mt-1" rows="5"></textarea>
                </div>

                <div class="mt-5">
                    <button type="submit" class="text-white bg-green-600 hover:bg-gray-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">Confirmer</button>
                    <button type="button" onclick="closeModal('reviewModal')" class="text-gray-900 bg-red-800 hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center" data-modal-toggle="delete-user-modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>