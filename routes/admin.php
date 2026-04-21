<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SignaturePdfController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/admin/login', [DepartmentLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [DepartmentLoginController::class, 'login']);
Route::post('/admin/logout', [DepartmentLoginController::class, 'logout'])->name('admin.logout');

Route::domain('administrativo.pct.social.br')->middleware(['auth', 'role:admin'])->group(function () {
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

    // 🏛️ Central de Atendimento (Command Center)
    Route::prefix('atendimento-central')->name('admin.atendimento.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\AtendimentoCentralController::class, 'dashboard'])->name('dashboard');
        Route::get('/ocorrencias', [\App\Http\Controllers\Admin\AtendimentoCentralController::class, 'index'])->name('index');
        Route::get('/triagem', [\App\Http\Controllers\Admin\AtendimentoCentralController::class, 'triage'])->name('triage');
        Route::get('/mobilizacao', [\App\Http\Controllers\Admin\AtendimentoCentralController::class, 'mobilization'])->name('mobilization');
        Route::get('/caso/{id}', [\App\Http\Controllers\Admin\AtendimentoCentralController::class, 'show'])->name('show');
        Route::post('/caso/{id}/status', [\App\Http\Controllers\Admin\AtendimentoCentralController::class, 'updateStatus'])->name('status');
        Route::post('/caso/{id}/nota', [\App\Http\Controllers\Admin\AtendimentoCentralController::class, 'addNote'])->name('note');
        Route::post('/caso/{id}/encaminhar', [\App\Http\Controllers\Admin\AtendimentoCentralController::class, 'forward'])->name('forward');
    });
    
    Route::get('/diretorios', [AdminDashboardController::class, 'directories'])->name('admin.directories');
    Route::post('/directories', [AdminDashboardController::class, 'storeDirectory'])->name('admin.directories.store');
    Route::get('/directories/{directory}', [AdminDashboardController::class, 'showDirectory'])->name('admin.directories.show');
    Route::post('/directories/{directory}/members', [AdminDashboardController::class, 'assignMember'])->name('admin.directories.members.store');
    Route::delete('/directories/{directory}/members/{member}', [AdminDashboardController::class, 'removeMember'])->name('admin.directories.members.destroy');
    Route::post('/directories/{directory}/update', [AdminDashboardController::class, 'updateDirectory'])->name('admin.directories.update');
    Route::post('/directories/{directory}/approve', [AdminDashboardController::class, 'approveDirectory'])->name('admin.directories.approve');
    Route::post('/directories/{directory}/release', [AdminDashboardController::class, 'releaseDirectory'])->name('admin.directories.release');
    Route::post('/directories/{directory}/block', [AdminDashboardController::class, 'blockDirectory'])->name('admin.directories.block');
    Route::post('/directories/{directory}/reject', [AdminDashboardController::class, 'rejectDirectory'])->name('admin.directories.reject');
    Route::get('/directories/{directory}/export', [AdminDashboardController::class, 'exportDirectory'])->name('admin.directories.export');
    
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

    // 9. Sistema de E-mail (PCT Mail)
    Route::prefix('mail')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\Mail\MailController::class, 'dashboard'])->name('admin.mail.dashboard');
        Route::post('/send', [\App\Http\Controllers\Admin\Mail\MailController::class, 'send'])->name('admin.mail.send');
        Route::get('/logs', [\App\Http\Controllers\Admin\Mail\MailController::class, 'logs'])->name('admin.mail.logs');
        
        Route::apiResource('/templates', \App\Http\Controllers\Admin\Mail\TemplateController::class)->names([
            'index' => 'admin.mail.templates.index',
            'store' => 'admin.mail.templates.store',
            'show' => 'admin.mail.templates.show',
            'update' => 'admin.mail.templates.update',
            'destroy' => 'admin.mail.templates.destroy',
        ]);
        
        Route::apiResource('/campaigns', \App\Http\Controllers\Admin\Mail\CampaignController::class)->names([
            'index' => 'admin.mail.campaigns.index',
            'store' => 'admin.mail.campaigns.store',
            'show' => 'admin.mail.campaigns.show',
            'update' => 'admin.mail.campaigns.update',
            'destroy' => 'admin.mail.campaigns.destroy',
        ]);
        
        Route::post('/campaigns/{campaign}/dispatch', [\App\Http\Controllers\Admin\Mail\CampaignController::class, 'dispatch'])->name('admin.mail.campaigns.dispatch');
    });

    // Configurações Gerais
    Route::get('/configuracoes', [AdminDashboardController::class, 'configuracoes'])->name('admin.configuracoes');
});
