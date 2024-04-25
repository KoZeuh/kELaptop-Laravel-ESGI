<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Stock;
use App\Models\Brand;

use Illuminate\Http\Request;

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
        $countOfOrdersProduct = 0;

        foreach ($ordersProduct as $orderItem) {
            $countOfOrdersProduct += $orderItem->quantity;
        }

        $countInStock = Stock::find($product->id)->quantity;

        return view('product.show', compact('product', 'categories', 'similarProducts', 'countOfOrdersProduct', 'countInStock'));
    }
}
