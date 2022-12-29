<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;



class AuthController extends Controller
{
    public function loginRedirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function loginCallback($driver)
    {
        $user_data = Socialite::driver($driver)->user();
        if (User::existsUser($user_data->email)) {
            $this->login($user_data->id, $user_data->email);
            return Redirect::route('home');
        }
    }
}
