<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showIndex()
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

        if ($request->old_password && $request->password && $request['password-confirm']) {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|min:8|confirmed'
            ], [
                'old_password.required' => 'L\'ancien mot de passe est requis',
                'password.required' => 'Le nouveau mot de passe est requis',
                'password.min' => 'Le nouveau mot de passe doit contenir au moins 8 caractères'
            ]);

            if (!Hash::check($request->old_password, $user->password)) {
                return redirect('/profile')->with('error', 'L\'ancien mot de passe est incorrect');
            }

            $user->password = Hash::make($request->password);
        }

        try {
            $user->save();

            return redirect('/profile')->with('success', 'Votre profil a été mis à jour');
        } catch (\Exception $e) {
            return redirect('/profile')->with('error', strval($request->firstname));
        }
    }

    public function showOrdersHistory()
    {
        $orders = Order::where('user_id', auth()->user()->id)->paginate(2);

        return view('profile.orders-history', compact('orders'));
    }
}
