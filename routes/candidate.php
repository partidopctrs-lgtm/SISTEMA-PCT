<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\CandidateDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/candidate/login', [DepartmentLoginController::class, 'showLoginForm'])->name('candidate.login');
Route::post('/candidate/login', [DepartmentLoginController::class, 'login']);

Route::middleware(['auth', 'role:candidate'])->prefix('candidate')->group(function () {
    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('candidate.dashboard');
});
