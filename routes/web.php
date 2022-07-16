<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\RegisterController as AuthRegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController as AuthForgotPasswordController;

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
    $data['title'] = 'Test';
    return view('blank-content', $data);
})->name('homepage');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthLoginController::class, 'index'])->name('login');
    Route::post('login', [AuthLoginController::class, 'action'])->name('do-login');

    Route::get('register', [AuthRegisterController::class, 'index'])->name('register');
    Route::post('register', [AuthRegisterController::class, 'action'])->name('do-register');

    Route::get('forgot-password', [AuthForgotPasswordController::class, 'index'])->name('forgot-password');
    Route::post('forgot-password', [AuthForgotPasswordController::class, 'action'])->name('do-forgot-password');
});