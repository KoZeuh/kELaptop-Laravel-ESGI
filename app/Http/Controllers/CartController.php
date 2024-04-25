<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;




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

    public function removeFromCart($productId)
    {
        Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $productId)
            ->delete();
    
        return redirect()->back();
    }

    public function updateQty(Request $request)
    {
        if ($request->quantity <= 0) {
            Cart::where('user_id', auth()->user()->id)
                ->where('product_id', $request->product_id)
                ->delete();
        } else {
            Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $request->product_id)
            ->update(['quantity' => $request->quantity]);
        }
    
        return redirect()->back();
    }

    public function showCheckout()
    {
        $categories = Category::all();
        return view('cart.checkout', compact('categories'));
    }

    public function checkoutValidate(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'card-identity' => 'required',
            'card-number' => 'required',
            'card-expiry' => 'required',
            'card-cvc' => 'required',
            'billing-address' => 'required',
            'billing-zip' => 'required',
            'billing-city' => 'required',
            'billing-country' => 'required',
        ]);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status' => 'PENDING',
        ]);

        $cartItems = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
                'quantity' => $cartItem->quantity
            ]);
        }

        Cart::where('user_id', auth()->user()->id)->delete();

        return view('cart.checkout-validate', compact('order'));
    }
}
