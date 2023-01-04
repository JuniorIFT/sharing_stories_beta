<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::get('/auth/redirect/{driver?}', [AuthController::class, 'redirect'])->name('login.redirect');
Route::get('/auth/callback/{driver?}', [AuthController::class, 'loginCallback'])->name('login.callback');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
