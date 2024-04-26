<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductReview;

class ProductReviewController extends Controller
{
    public function postReview(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|min:5'
        ]);

        ProductReview::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'review' => $request->review
        ]);

        return redirect()->back()->with('success', 'Votre avis a été ajouté avec succès');
    }
}
