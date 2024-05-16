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
        ], [
            'product_id.required' => 'Le produit est requis',
            'product_id.exists' => 'Le produit n\'existe pas',
            'rating.required' => 'La note est requise',
            'rating.integer' => 'La note doit être un nombre entier',
            'rating.min' => 'La note doit être supérieure ou égale à 1',
            'rating.max' => 'La note doit être inférieure ou égale à 5',
            'review.required' => 'L\'avis est requis',
            'review.string' => 'L\'avis doit être une chaîne de caractères',
            'review.min' => 'L\'avis doit contenir au moins 5 caractères'
        ]);

        try {
            $review = ProductReview::where('product_id', $request->product_id)
                ->where('user_id', auth()->id())
                ->first();

            if ($review) {
                return redirect()->back()->with('error', 'Vous avez déjà donné votre avis sur ce produit');
            }

            ProductReview::create([
                'product_id' => $request->product_id,
                'user_id' => auth()->id(),
                'rating' => $request->rating,
                'review' => $request->review
            ]);

            return redirect()->back()->with('success', 'Votre avis a été ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }
}
