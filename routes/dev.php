<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dev\DevDashboardController;

/*
|--------------------------------------------------------------------------
| Portal DEV e Infraestrutura - PCT
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('dev')->name('dev.')->group(function () {
    Route::get('/dashboard', [DevDashboardController::class, 'index'])->name('dashboard');
    Route::get('/saude', [DevDashboardController::class, 'health'])->name('health');
    Route::get('/infra', [DevDashboardController::class, 'infra'])->name('infra');
    Route::get('/seguranca', [DevDashboardController::class, 'security'])->name('security');
    Route::get('/logs', [DevDashboardController::class, 'logs'])->name('logs');
    Route::get('/database', [DevDashboardController::class, 'database'])->name('database');
    Route::get('/backups', [DevDashboardController::class, 'backups'])->name('backups');
    Route::get('/filas', [DevDashboardController::class, 'queues'])->name('queues');
    Route::get('/integracoes', [DevDashboardController::class, 'integrations'])->name('integrations');
    Route::get('/dominios', [DevDashboardController::class, 'domains'])->name('domains');
    Route::get('/suporte', [DevDashboardController::class, 'support'])->name('support');
    Route::get('/ambientes', [DevDashboardController::class, 'environments'])->name('environments');
    Route::get('/config', [DevDashboardController::class, 'config'])->name('config');
});
