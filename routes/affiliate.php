<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Affiliate\AffiliateDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/affiliate/login', [DepartmentLoginController::class, 'showLoginForm'])->name('affiliate.login');
Route::post('/affiliate/login', [DepartmentLoginController::class, 'login']);

Route::middleware(['auth', 'role:affiliate'])->prefix('affiliate')->group(function () {
    Route::get('/dashboard', [AffiliateDashboardController::class, 'index'])->name('affiliate.dashboard');
});
