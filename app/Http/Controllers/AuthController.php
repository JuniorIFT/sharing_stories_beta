<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;




class AuthController extends Controller
{
    public function redirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function loginCallback($driver)
    {
        $user_data = Socialite::driver($driver)->user();
        $user = User::where('email', $user_data->email)->first();
        if ($user) {
            Auth::login($user);
            Session::put('user_id', $user->id);
            return Redirect::to('/');
        } else {
            $user = new UserController();
            $user->store($user_data, $driver);
            return Redirect::to('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush('user_id');
        return Redirect::to('/');
    }
}
