<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Committee\CommitteeDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/committee/login', [DepartmentLoginController::class, 'showLoginForm'])->name('committee.login');
Route::post('/committee/login', [DepartmentLoginController::class, 'login']);

Route::middleware(['auth', 'role:committee'])->prefix('committee')->group(function () {
    Route::get('/dashboard', [CommitteeDashboardController::class, 'index'])->name('committee.dashboard');
});
