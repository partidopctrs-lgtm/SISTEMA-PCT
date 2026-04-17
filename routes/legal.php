<?php

use App\Http\Controllers\Legal\LegalDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('legal')->name('legal.')->group(function () {
    Route::get('/', [LegalDashboardController::class, 'index'])->name('dashboard');
    Route::get('/requests', [LegalDashboardController::class, 'requests'])->name('requests');
    Route::get('/requests/{id}', [LegalDashboardController::class, 'showRequest'])->name('requests.show');
    Route::post('/requests/{id}/message', [LegalDashboardController::class, 'sendMessage'])->name('requests.message');
    Route::post('/requests/{id}/status', [LegalDashboardController::class, 'updateStatus'])->name('requests.status');
});
