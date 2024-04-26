<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Stock;
use App\Models\Brand;
use App\Models\ProductReview;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        $products = Product::paginate(9);
        $brands = Brand::all();

        return view('product.list', compact('products', 'categories', 'brands'));
    }

    public function show($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $similarProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->limit(4)->get();
        $ordersProduct = OrderItem::where('product_id', $product->id)->get();
        $reviews = ProductReview::where('product_id', $product->id)->paginate(3);
        $countOfOrdersProduct = 0;

        foreach ($ordersProduct as $orderItem) {
            $countOfOrdersProduct += $orderItem->quantity;
        }

        $countInStock = Stock::find($product->id)->quantity;

        $user = Auth::user();
        $hasPurchased = false;

        if ($user) {
            $hasPurchased = Order::whereHas('items', function ($query) use ($id) {
                $query->where('product_id', $id);
            })->where('user_id', $user->id)->where('status', 'COMPLETED')->exists();
        }


        return view('product.show', compact('product', 'categories', 'similarProducts', 'countOfOrdersProduct', 'countInStock', 'reviews', 'hasPurchased'));
    }
}
