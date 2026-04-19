<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SignaturePdfController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/admin/login', [DepartmentLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [DepartmentLoginController::class, 'login']);
Route::post('/admin/logout', [DepartmentLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/command-center', [AdminDashboardController::class, 'commandCenter'])->name('admin.command_center');
    Route::get('/members', [AdminDashboardController::class, 'members'])->name('admin.members');
    Route::post('/member/store', [AdminDashboardController::class, 'storeMember'])->name('admin.member.store');
    Route::get('/member/{user}/pdf', [SignaturePdfController::class, 'exportMemberPdf'])->name('admin.member.pdf');
    
    // 1. Partido em Formação (Assinaturas)
    Route::get('/partido', [AdminDashboardController::class, 'partyFormation'])->name('admin.party');
    Route::get('/partido/export-csv', [AdminDashboardController::class, 'exportSignaturesCsv'])->name('admin.party.export-csv');
    Route::get('/partido/export-pdf', [SignaturePdfController::class, 'exportSignaturesPdf'])->name('admin.party.export-pdf');
    Route::post('/partido/{signature}/approve', [AdminDashboardController::class, 'approveSignature'])->name('admin.party.approve');
    Route::get('/partido/{signature}/pdf', [SignaturePdfController::class, 'exportOnePdf'])->name('admin.party.pdf');
    
    // 2. Demandas da População
    Route::get('/demandas', [AdminDashboardController::class, 'publicDemands'])->name('admin.demands');
    
    Route::get('/diretorios', [AdminDashboardController::class, 'directories'])->name('admin.directories');
    Route::post('/diretorios/store', [AdminDashboardController::class, 'storeDirectory'])->name('admin.directories.store');
    Route::post('/diretorios/{directory}/update', [AdminDashboardController::class, 'updateDirectory'])->name('admin.directories.update');
    Route::get('/diretorios/{directory}/export', [AdminDashboardController::class, 'exportDirectory'])->name('admin.directories.export');
    
    // 4. Governança Interna
    Route::get('/governanca', [AdminDashboardController::class, 'governance'])->name('admin.governance');
    
    // 5. Comunicação e Mobilização
    Route::get('/comunicacao', [AdminDashboardController::class, 'communication'])->name('admin.communication');
    
    // 6. Inteligência e Controle
    Route::get('/inteligencia', [AdminDashboardController::class, 'intelligence'])->name('admin.intelligence');
    Route::get('/inteligencia/relatorio', [AdminDashboardController::class, 'intelligenceReport'])->name('admin.reports.intelligence');
    
    // 7. Jurídico Institucional
    Route::get('/juridico', [AdminDashboardController::class, 'legal'])->name('admin.legal');

    // 8. Escola de Formação
    Route::get('/certificados', [AdminDashboardController::class, 'issueCertificate'])->name('admin.certificates');

    // Configurações Gerais
    Route::get('/configuracoes', [AdminDashboardController::class, 'configuracoes'])->name('admin.configuracoes');
});
