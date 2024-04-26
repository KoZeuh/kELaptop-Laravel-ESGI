<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;


class CheckoutController extends Controller
{
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

        $cartItems = Cart::where('user_id', auth()->user()->id)->get();

        if ($cartItems->count() == 0) {
            return redirect('/');
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status' => 'PENDING',
            'promo_code' => session('promoCode') ? session('promoCode')->code : null
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
                'quantity' => $cartItem->quantity
            ]);
        }

        Cart::where('user_id', auth()->user()->id)->delete();

        session()->forget('promoCode');

        return view('cart.checkout-validate', compact('order'));
    }
}
