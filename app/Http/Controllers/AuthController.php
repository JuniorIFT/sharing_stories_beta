<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function loginCallback($driver, UserController $user)
    {
        $user_data = Socialite::driver($driver)->user();
        $user->store($user_data, $driver);
        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush('user_id');
    }
}
