<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    public function store($user_data, $auth_type)
    {
        $user = User::firstOrCreate([
            'social_id' => $user_data->id,
        ], [
            'name' => $user_data->name,
            'email' => $user_data->email,
            'social_token' => $user_data->token,
            'avatar_url' => $user_data->avatar,
            'nickname' => $user_data->nickname,
            'auth_type' => $auth_type
        ]);
        Auth::login($user);
    }


    public function edit()
    {
        $user = Auth::user();
        return view('edit', compact('user'));
    }
}
