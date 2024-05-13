<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $userData = $user->user;

            if (!$userData['email_verified']) {
                return redirect()->route('login')->with('error', 'Vous devez valider votre email pour vous connecter');
            }

            if (User::where('email', $userData['email'])->exists()) {
                $user = User::where('email', $userData['email'])->first();
            } else {
                $user = User::create([
                    'firstname' => $userData['given_name'],
                    'lastname' => $userData['family_name'],
                    'email' => $userData['email'],
                    'password' => Hash::make(Str::random(24)),
                    'created_with_google' => true,
                ]);

                $user->assignRole('user');
            }

            if ($user instanceof User) {
                Auth::login($user);

                return redirect('/')->with('success', 'Vous vous êtes connecté avec succès');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return back()->with('error', 'Une erreur est survenue..');
    }
}
