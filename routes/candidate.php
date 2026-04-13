<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\CandidateDashboardController;

Route::middleware(['role:candidate'])->prefix('candidate')->group(function () {
    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('candidate.dashboard');
});
