<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::inRandomOrder()->limit(8)->get();

        return view('home', compact('categories', 'products'));
    }

    public function aboutUs()
    {
        return view('about_us');
    }

    public function contactUs()
    {
        return view('contact');
    }
}
