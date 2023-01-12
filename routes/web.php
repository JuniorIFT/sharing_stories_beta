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


Route::get('/auth/redirect/{driver?}', [AuthController::class, 'redirect'])->name('redirect');
Route::get('/auth/callback/{driver?}', [AuthController::class, 'callback'])->name('callback');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/user/edit/', [UserController::class, 'edit'])->name('user.edit');

Route::put('/user/update/{id}', [UserController::class, 'update'])->name('update.user');
