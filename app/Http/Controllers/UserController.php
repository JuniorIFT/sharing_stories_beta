<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function dashboard()
    {
    }

    public function editProfile()
    {
    }

    public function updateProfile()
    {
    }

    public function editAvatar()
    {
    }

    public function updateAvatar()
    {
    }

    public function editBiography()
    {
    }

    public function updateBiography()
    {
    }
}
