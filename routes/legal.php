<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Legal\LegalController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/legal/login', [DepartmentLoginController::class, 'showLoginForm'])->name('legal.login');
Route::post('/legal/login', [DepartmentLoginController::class, 'login']);

Route::middleware(['auth', 'role:legal'])->prefix('legal')->group(function () {
    Route::get('/dashboard', [LegalController::class, 'index'])->name('legal.dashboard');
    Route::get('/modelos-oficios', [LegalController::class, 'modelosOficios'])->name('legal.modelos_oficios');
    Route::get('/ficha-filiacao', [LegalController::class, 'fichaFiliacao'])->name('legal.ficha_filiacao');
});
