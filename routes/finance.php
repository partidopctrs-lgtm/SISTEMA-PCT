<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Finance\FinanceController;
use App\Http\Controllers\Auth\DepartmentLoginController;



Route::domain('tesouraria.pct.social.br')->middleware(['auth', 'role:finance'])->group(function () {
    Route::get('/dashboard', [FinanceController::class, 'index'])->name('finance.dashboard');
    Route::get('/transparencia', [FinanceController::class, 'transparency'])->name('finance.transparency');
    Route::get('/doadores', [FinanceController::class, 'donors'])->name('finance.donors');
    Route::get('/conciliacao', [FinanceController::class, 'reconciliation'])->name('finance.reconciliation');
    Route::get('/modelos-oficios', [FinanceController::class, 'modelosOficios'])->name('finance.modelos_oficios');
});
