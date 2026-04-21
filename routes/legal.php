<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Legal\LawyerAuthController;
use App\Http\Controllers\Legal\LawyerDashboardController;
use App\Http\Controllers\Legal\LegalDashboardController;

// =============================================
// PAINEL JURÍDICO INSTITUCIONAL (Supervisão)
// Acesso: admin, legal
// =============================================
Route::domain('juridico.pct.social.br')->middleware(['auth'])->name('legal.')->group(function () {
    Route::get('/dashboard', [LegalDashboardController::class, 'index'])->name('dashboard');
    Route::get('/solicitacoes', [LegalDashboardController::class, 'requests'])->name('requests');
    Route::get('/solicitacoes/{id}', [LegalDashboardController::class, 'showRequest'])->name('requests.show');
    Route::post('/solicitacoes/{id}/mensagem', [LegalDashboardController::class, 'sendMessage'])->name('requests.message');
    Route::post('/solicitacoes/{id}/status', [LegalDashboardController::class, 'updateStatus'])->name('requests.status');
    Route::get('/denuncias', [LegalDashboardController::class, 'denuncias'])->name('denuncias');
    Route::get('/processos', [LegalDashboardController::class, 'processos'])->name('processos');
    Route::get('/pareceres', [LegalDashboardController::class, 'pareceresList'])->name('pareceres');
    Route::get('/advogados', [LegalDashboardController::class, 'advogados'])->name('advogados');
    Route::post('/advogados/registrar', [LegalDashboardController::class, 'registrarAdvogado'])->name('advogados.registrar');
    Route::get('/contratos', [LegalDashboardController::class, 'contratos'])->name('contratos');
    Route::get('/alertas', [LegalDashboardController::class, 'alertas'])->name('alertas');
});

// =============================================
// PAINEL DO ADVOGADO (Operacional Individual)
// Login isolado, apenas role legal/admin
// =============================================
Route::get('/advogado/login', [LawyerAuthController::class, 'showLogin'])->name('advogado.login');
Route::post('/advogado/login', [LawyerAuthController::class, 'login'])->name('advogado.login.post');
Route::post('/advogado/logout', [LawyerAuthController::class, 'logout'])->name('advogado.logout');

Route::middleware(['auth'])->prefix('advogado')->name('advogado.')->group(function () {
    Route::get('/dashboard', [LawyerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/tarefas', [LawyerDashboardController::class, 'tarefas'])->name('tarefas');
    Route::get('/tarefas/{id}', [LawyerDashboardController::class, 'showTarefa'])->name('tarefas.show');
    Route::post('/tarefas/{id}/responder', [LawyerDashboardController::class, 'responderTarefa'])->name('tarefas.responder');
    Route::get('/denuncias', [LawyerDashboardController::class, 'denuncias'])->name('denuncias');
    Route::get('/processos', [LawyerDashboardController::class, 'processos'])->name('processos');
    Route::get('/pareceres', [LawyerDashboardController::class, 'pareceres'])->name('pareceres');
    Route::post('/pareceres', [LawyerDashboardController::class, 'storeParecer'])->name('pareceres.store');
    Route::get('/tribunal-digital', [LawyerDashboardController::class, 'tribunal'])->name('tribunal');
    Route::get('/perfil', [LawyerDashboardController::class, 'perfil'])->name('perfil');
});
