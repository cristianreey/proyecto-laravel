<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])->name('users.index');


Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});



// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Rutas de registro y verificación de correo electrónico
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas de verificación de correo electrónico
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/verify/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// Rutas protegidas que requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        if (auth()->user()->hasVerifiedEmail()) {
            return redirect()->route('index');
        } else {
            return redirect()->route('verification.notice');
        }
    })->name('home');

    Route::get('/layouts', [HomeController::class, 'index'])->name('index');
    Route::resource('projects', ProjectController::class);
});

// Rutas predeterminadas para la autenticación
Auth::routes();