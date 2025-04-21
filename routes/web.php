<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthController::class, 'registration'])->name('register');

Route::post('/register', [AuthController::class, 'registrationPost'])->name('register.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');