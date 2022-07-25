<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\RegisterController as AuthRegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController as AuthForgotPasswordController;

use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('blocked', function () {
    $data['title'] = 'Blocked';
    return view('auth.blocked', $data);
})->name('blocked');

Route::middleware(['auth', 'emailCheck'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthLoginController::class, 'index'])->name('login');
    Route::post('login', [AuthLoginController::class, 'action'])->name('do-login');
    Route::get('logout', [AuthLoginController::class, 'actionLogout'])->name('do-logout');

    Route::get('register', [AuthRegisterController::class, 'index'])->name('register');
    Route::post('register', [AuthRegisterController::class, 'action'])->name('do-register');

    Route::get('forgot-password', [AuthForgotPasswordController::class, 'index'])->name('forgot-password');
    Route::post('forgot-password', [AuthForgotPasswordController::class, 'action'])->name('do-forgot-password');

    Route::get('verify/{token}', [AuthRegisterController::class, 'verify'])->name('verify');
});