<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Committee\CommitteeDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/committee/login', [DepartmentLoginController::class, 'showLoginForm'])->name('committee.login');
Route::post('/committee/login', [DepartmentLoginController::class, 'login']);

Route::middleware(['auth', 'role:committee'])->prefix('committee')->group(function () {
    Route::get('/dashboard', [CommitteeDashboardController::class, 'index'])->name('committee.dashboard');
    Route::get('/members', [CommitteeDashboardController::class, 'members'])->name('committee.members');
    Route::get('/financial', [CommitteeDashboardController::class, 'financial'])->name('committee.financial');
    Route::post('/financial', [CommitteeDashboardController::class, 'storeFinancialRecord'])->name('committee.financial.store');
    Route::get('/modelos-oficios', [CommitteeDashboardController::class, 'modelosOficios'])->name('committee.modelos_oficios');
    Route::get('/ficha-filiacao', [CommitteeDashboardController::class, 'fichaFiliacao'])->name('committee.ficha_filiacao');
});
