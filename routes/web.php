<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// {-- Auth Routes --}
Route::get('/auth/redirect/{driver?}', [AuthController::class, 'redirect'])->name('redirect');
Route::get('/auth/callback/{driver?}', [AuthController::class, 'callback'])->name('callback');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// {-- User Routes --}
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('edit-profile');

Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update-profile');

Route::get('/edit-avatar', [UserController::class, 'editAvatar'])->name('edit-avatar');

Route::post('/update-avatar', [UserController::class, 'updateAvatar'])->name('update-avatar');

Route::get('/edit-biography', [UserController::class, 'editBiography'])->name('edit-biography');

Route::post('/update-biography', [UserController::class, 'updateBiography'])->name('update-biography');

Route::get('/edit-phone', [UserController::class, 'editPhone'])->name('edit-phone');

Route::post('/update-phone', [UserController::class, 'updatePhone'])->name('update-phone');







