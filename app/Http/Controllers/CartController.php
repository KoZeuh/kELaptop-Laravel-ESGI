<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Models\Cart;
use App\Models\Category;
use App\Models\PromoCode;

class CartController extends Controller
{
    public function addOrUpdate(Request $request)
    {
        try {
            $cartItem = Cart::updateOrCreate(
                [
                    'user_id' => auth()->user()->id,
                    'product_id' => $request->product_id
                ],
                ['quantity' => \DB::raw('quantity + ' . $request->quantity)]
            );

            $cartItem->save();

            return redirect()->back()->with('success', 'Produit ajouté au panier');
        } catch (QueryException $e) {
            if ($e->getCode() == '45000') {
                return redirect()->back()->with('error', 'Il n\'y a pas assez de stock disponible pour cet article.');
            }

            return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer plus tard.');
        }
    }

    public function remove($productId)
    {
        Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $productId)
            ->delete();

        return redirect()->back();
    }

    public function updateQuantity(Request $request)
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

    public function show()
    {
        $categories = Category::all();
        return view('cart.show', compact('categories'));
    }

    public function checkCoupon(Request $request) {
        try {
            $request->validate(['coupon' => 'required']);
            $coupon = $request->coupon;
            $promoCode = PromoCode::where('code', $coupon)->first();

            if (!$promoCode) {
                return redirect()->back()->with('error', 'Code promo invalide');
            }

            if (!$promoCode->isValid()) {
                return redirect()->back()->with('error', 'Code promo expiré');
            }

            session()->put('promoCode', $promoCode);
            return redirect()->back()->with('success', 'Code promo appliqué');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }

    public function removeCoupon() {
        session()->forget('promoCode');

        return redirect()->back()->with('success', 'Code promo retiré');
    }
}
