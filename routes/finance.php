<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Finance\FinanceController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/finance/login', [DepartmentLoginController::class, 'showLoginForm'])->name('finance.login');
Route::post('/finance/login', [DepartmentLoginController::class, 'login']);

Route::middleware(['auth', 'role:finance'])->prefix('finance')->group(function () {
    Route::get('/dashboard', [FinanceController::class, 'index'])->name('finance.dashboard');
});
