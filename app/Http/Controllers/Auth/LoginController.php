<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function facebook(){
        return Socialite::driver('facebook')->scopes('user_photos')->redirect();
    }

    public function facebookRedirect(){
        $user = Socialite::driver('facebook')->user();
     
        $user = User::firstOrCreate([
            'email' => $user->email
        ],
        [
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)),
            'fb_id' => $user->id,
            'fb_token' => $user->token
        ]);

        Auth::login($user, true);

        return redirect()->route('home');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect(){
        $user = Socialite::driver('google')->user();

        $user = User::firstOrCreate([
            'email' => $user->email
        ],
        [
            'name' => $user->name,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user, true);

        return redirect()->route('home');
    }
}
