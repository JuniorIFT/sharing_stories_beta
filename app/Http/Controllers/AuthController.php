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
    public function loginRedirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function loginCallback($driver)
    {
        $user_data = Socialite::driver($driver)->user();
        if (User::where('email', $user_data->email)->first()) {
            $this->login($user_data->id, $user_data->email, $driver);
        } else {
            $user = new UserController();
            $user->store($user_data, $driver);
            return Redirect::to('/');
        }
    }

    public function login($id, $email, $driver)
    {
        $credentials = [
            'email' => $email,
            'password' => $id . $email . $driver
        ];
        if (Auth::attempt($credentials)) {
            Session::put('user', $email);
        } else {
            return new JsonResponse([
                'success' => false,
                'message' => 'E-mail ou senha inválidos'
            ]);
        }
    }
}
