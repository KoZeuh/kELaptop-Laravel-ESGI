<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Mail\ContactMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendContact(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required',
        ]);

        Mail::to('contact@kelaptop.com')->send(new ContactMail($request->all()));


        return back()->with('success', 'Votre message a bien été envoyé. Vous recevrez une réponse dans les plus brefs délais.');
    }
}
