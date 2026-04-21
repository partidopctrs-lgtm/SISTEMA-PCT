<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Committee\CommitteeDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/committee/login', [DepartmentLoginController::class, 'showLoginForm'])->name('committee.login');
Route::post('/committee/login', [DepartmentLoginController::class, 'login']);

// Permitir que qualquer subdomínio de diretório acesse estas rotas (Taquara, etc)
// Adicionamos o 'where' para permitir subdomínios com pontos (ex: diretorio.taquara)
Route::domain('{subdomain}.pct.social.br')
    ->where('subdomain', '.*')
    ->middleware(['auth', 'role:committee'])
    ->group(function () {
    Route::get('/dashboard', [CommitteeDashboardController::class, 'index'])->name('committee.dashboard');
    Route::get('/members', [CommitteeDashboardController::class, 'members'])->name('committee.members');
    Route::post('/members/store', [CommitteeDashboardController::class, 'storeMember'])->name('committee.members.store');
    Route::get('/member/{user}/pdf', [\App\Http\Controllers\Admin\SignaturePdfController::class, 'exportMemberPdf'])->name('committee.member.pdf');
    Route::get('/members/impersonate/{id}', [CommitteeDashboardController::class, 'impersonate'])->name('committee.members.impersonate');
    
    // Módulo de Documentos
    Route::get('/documents', [CommitteeDashboardController::class, 'documents'])->name('committee.documents');
    Route::post('/documents/store', [CommitteeDashboardController::class, 'storeDocument'])->name('committee.documents.store');
    
    // Central de Solicitações
    Route::get('/solicitations', [CommitteeDashboardController::class, 'solicitations'])->name('committee.solicitations');
    Route::post('/solicitations/store', [CommitteeDashboardController::class, 'storeSolicitation'])->name('committee.solicitations.store');
    
    // Gestão de Despesas (Financeiro)
    Route::get('/financial', [CommitteeDashboardController::class, 'financial'])->name('committee.financial');
    Route::post('/financial', [CommitteeDashboardController::class, 'storeFinancialRecord'])->name('committee.financial.store');
    
    // Serviços Contratados
    Route::get('/services', [CommitteeDashboardController::class, 'services'])->name('committee.services');
    
    // Reembolsos
    Route::get('/reimbursements', [CommitteeDashboardController::class, 'reimbursements'])->name('committee.reimbursements');
    
    // Prestadores
    Route::get('/providers', [CommitteeDashboardController::class, 'providers'])->name('committee.providers');
    
    // BI & Relatórios
    Route::get('/reports', [CommitteeDashboardController::class, 'reports'])->name('committee.reports');
    
    // Tarefas
    Route::get('/tasks', [CommitteeDashboardController::class, 'tasks'])->name('committee.tasks');
    Route::get('/assinaturas', [CommitteeDashboardController::class, 'signatures'])->name('committee.signatures');
    Route::get('/sede-eventos', [CommitteeDashboardController::class, 'sede'])->name('committee.sede');

    Route::get('/modelos-oficios', [CommitteeDashboardController::class, 'modelosOficios'])->name('committee.modelos_oficios');
    Route::get('/ficha-filiacao', [CommitteeDashboardController::class, 'fichaFiliacao'])->name('committee.ficha_filiacao');
});
