<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
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
            //RETORNAR JSON COM DADOS DO USUARIO
        } else {
            $user = new UserController();
            $user->store($user_data, $driver);
            //RETORNAR PAGINA DE LOGIN
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush('user_id');
        //RETORNAR PAGINA DE LOGIN
    }
}
