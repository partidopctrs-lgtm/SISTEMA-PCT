<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Committee\CommitteeDashboardController;

Route::middleware(['role:committee'])->prefix('committee')->group(function () {
    Route::get('/dashboard', [CommitteeDashboardController::class, 'index'])->name('committee.dashboard');
});
