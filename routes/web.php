<?php

use App\Http\Controllers\PasteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/vk/auth', [SocialController::class, 'vk'])->name('vk.auth');
    Route::get('/vk/auth/callback', [SocialController::class, 'callback']);
});

Route::resource('/paste', PasteController::class);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
