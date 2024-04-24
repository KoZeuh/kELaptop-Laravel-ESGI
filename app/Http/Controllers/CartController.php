<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cartItem = Cart::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id
            ],
            ['quantity' => \DB::raw('quantity + ' . $request->quantity)]
        );

        $cartItem->save();
    
        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }
    
    public function showCart()
    {
        $categories = Category::all();
        return view('cart.show', compact('categories'));
    }

    public function removeFromCart($productId)
    {
        Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $productId)
            ->delete();
    
        return redirect()->back()->with('success', 'Produit retiré du panier');
    }


    public function showCheckout()
    {
        $categories = Category::all();
        return view('cart.checkout', compact('categories'));
    }
}
