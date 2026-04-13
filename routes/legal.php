<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Legal\LegalController;

Route::middleware(['role:legal'])->prefix('legal')->group(function () {
    Route::get('/dashboard', [LegalController::class, 'index'])->name('legal.dashboard');
});
