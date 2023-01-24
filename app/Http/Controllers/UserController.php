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
        return view('dashboard');
    }

    public function profile()
    {
    }

    public function editProfile()
    {
        $user_id = Auth::id();
        $user = User::select('avatar_url', 'name', 'email', 'nickname', 'biography', 'genre')->where('id', $user_id)->first();
        return view('profile', compact('user'));
    }
}
