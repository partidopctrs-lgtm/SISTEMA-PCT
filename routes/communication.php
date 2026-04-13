<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['role:communication'])->prefix('communication')->group(function () {
    Route::get('/dashboard', function() {
        return "Painel de Comunicação";
    })->name('communication.dashboard');
});
