<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Communication\CommunicationController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/communication/login', [DepartmentLoginController::class, 'showLoginForm'])->name('communication.login');
Route::post('/communication/login', [DepartmentLoginController::class, 'login']);

Route::middleware(['auth', 'role:communication'])->prefix('communication')->group(function () {
    Route::get('/dashboard', [CommunicationController::class, 'index'])->name('communication.dashboard');
});
