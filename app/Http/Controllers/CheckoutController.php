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
        ], [
            'firstname.required' => 'Le prénom est requis',
            'lastname.required' => 'Le nom est requis',
            'phone.required' => 'Le téléphone est requis',
            'card-identity.required' => 'L\'identité de la carte est requise',
            'card-number.required' => 'Le numéro de carte est requis',
            'card-expiry.required' => 'La date d\'expiration de la carte est requise',
            'card-cvc.required' => 'Le CVC de la carte est requis',
            'billing-address.required' => 'L\'adresse de facturation est requise',
            'billing-zip.required' => 'Le code postal de facturation est requis',
            'billing-city.required' => 'La ville de facturation est requise',
            'billing-country.required' => 'Le pays de facturation est requis',
        ]);

        try {
            $cartItems = Cart::where('user_id', auth()->user()->id)->get();

            if ($cartItems->count() == 0) {
                return redirect('/');
            }

            foreach ($cartItems as $cartItem) {
                if ($cartItem->product->stock->quantity < $cartItem->quantity) {
                    return redirect()->back()->with('error', 'Il n\'y a pas assez de stock disponible pour cet article.');
                }
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
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }
}
