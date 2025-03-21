<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/admin/login');
});

Route::redirect('login', '/admin/login')->name('login');

Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirect'])
    ->name('filament.auth.google');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'callback'])
    ->name('filament.auth.google.callback');
