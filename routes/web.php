<?php

use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Homecontroller::class, 'home'])->name('app_home');

Route::get('/about', [Homecontroller::class, 'about'])->name('app_about');

Route::match(['get', 'post'], '/dashboard', [Homecontroller::class, 'dashboard'])
->middleware('auth')
->name('app_dashboard');

Route::get('/logout', [Logincontroller::class, 'logout'])
->name('app_logout');

Route::post('/exist_email', [LoginController::class, 'existEmail'])
->name('app_exist_email');


Route::match(['get', 'post'], '/activation_code/{token} ', [LoginController::class, 'activationCode'])
->name('app_activation_code');

Route::get('/user_checker', [LoginController::class, 'userChecker'])
->name('app_user_checker');

