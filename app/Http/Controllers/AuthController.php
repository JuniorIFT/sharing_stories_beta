<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback($driver, UserController $user)
    {
        if ($user_data = Socialite::driver($driver)->user()) {
            $user->store($user_data, $driver);
            return redirect('/');
        } else {
            return new JsonResponse([
                'message' => 'Erro ao fazer login com o ' . $driver,
            ], 500);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
