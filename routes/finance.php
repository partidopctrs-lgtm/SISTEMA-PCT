<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Finance\FinanceController;

Route::middleware(['role:finance'])->prefix('finance')->group(function () {
    Route::get('/dashboard', [FinanceController::class, 'index'])->name('finance.dashboard');
});
