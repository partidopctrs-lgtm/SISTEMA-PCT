<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\RegistrationController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/manifesto', [HomeController::class, 'manifesto'])->name('manifesto');
Route::get('/propostas', [HomeController::class, 'proposals'])->name('proposals');
Route::get('/cadastro', [RegistrationController::class, 'index'])->name('register.index');
Route::post('/cadastro', [RegistrationController::class, 'store'])->name('register.store');

Route::get('/login', function() {
    return view('auth.login');
})->name('login');
