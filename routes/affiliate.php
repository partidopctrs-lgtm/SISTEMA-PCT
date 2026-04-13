<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Affiliate\AffiliateDashboardController;

Route::middleware(['role:affiliate'])->prefix('affiliate')->group(function () {
    Route::get('/dashboard', [AffiliateDashboardController::class, 'index'])->name('affiliate.dashboard');
});
