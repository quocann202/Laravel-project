<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManagement;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/login', [AuthManagement::class, 'login'])->name('login');

Route::post('/login', [AuthManagement::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthManagement::class, 'registration'])->name('register');

Route::post('/register', [AuthManagement::class, 'registrationPost'])->name('register.post');

Route::get('/logout', [AuthManagement::class, 'logout'])->name('logout');