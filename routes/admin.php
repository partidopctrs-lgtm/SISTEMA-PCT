<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/admin/login', [DepartmentLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [DepartmentLoginController::class, 'login']);
Route::post('/admin/logout', [DepartmentLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/command-center', [AdminDashboardController::class, 'commandCenter'])->name('admin.command_center');
    Route::get('/members', [AdminDashboardController::class, 'members'])->name('admin.members');
    Route::post('/member/store', [AdminDashboardController::class, 'storeMember'])->name('admin.member.store');
    
    // 1. Partido em Formação (Assinaturas)
    Route::get('/partido', [AdminDashboardController::class, 'partyFormation'])->name('admin.party');
    
    // 2. Demandas da População
    Route::get('/demandas', [AdminDashboardController::class, 'publicDemands'])->name('admin.demands');
    
    // 3. Gestão de Diretórios
    Route::get('/diretorios', [AdminDashboardController::class, 'directories'])->name('admin.directories');
    
    // 4. Governança Interna
    Route::get('/governanca', [AdminDashboardController::class, 'governance'])->name('admin.governance');
    
    // 5. Comunicação e Mobilização
    Route::get('/comunicacao', [AdminDashboardController::class, 'communication'])->name('admin.communication');
    
    // 6. Inteligência e Controle
    Route::get('/inteligencia', [AdminDashboardController::class, 'intelligence'])->name('admin.intelligence');
    
    // 7. Jurídico Institucional
    Route::get('/juridico', [AdminDashboardController::class, 'legal'])->name('admin.legal');

    // 8. Escola de Formação
    Route::get('/certificados', [AdminDashboardController::class, 'issueCertificate'])->name('admin.certificates');

    // Configurações Gerais
    Route::get('/configuracoes', [AdminDashboardController::class, 'configuracoes'])->name('admin.configuracoes');
});
