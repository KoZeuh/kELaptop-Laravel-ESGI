<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('profile.index');
    }

    public function save(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->country = $request->country;

        $user->save();

        return redirect('/profile')->with('success', 'Votre profil a été mis à jour');
    }

    public function ordersHistory()
    {
        $orders = Order::where('user_id', auth()->user()->id)->paginate(2);

        return view('profile.orders-history', compact('orders'));
    }
}
