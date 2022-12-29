<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});


Route::get('/auth/redirect/{driver?}', [AuthController::class, 'loginRedirect'])->name('login.redirect');
Route::get('/auth/callback/{driver?}', [AuthController::class, 'loginCallback'])->name('login.callback');
