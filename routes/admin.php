<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/admin/login', [DepartmentLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [DepartmentLoginController::class, 'login']);
Route::post('/admin/logout', [DepartmentLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/dashboard/member', [AdminDashboardController::class, 'storeMember'])->name('admin.storeMember');
    
    // Management Modules
    Route::get('/perfis', [AdminDashboardController::class, 'perfis'])->name('admin.profiles');
    Route::get('/carteirinhas', [AdminDashboardController::class, 'carteirinhas'])->name('admin.carteirinhas');
    Route::get('/escola', [AdminDashboardController::class, 'escola'])->name('admin.escola');
    Route::get('/indicacoes', [AdminDashboardController::class, 'referrals'])->name('admin.referrals');
    Route::get('/missoes', [AdminDashboardController::class, 'missoes'])->name('admin.missoes');
    Route::get('/comunidade', [AdminDashboardController::class, 'comunidade'])->name('admin.comunidade');
    Route::get('/documentos', [AdminDashboardController::class, 'documentos'])->name('admin.documentos');
    Route::get('/eventos', [AdminDashboardController::class, 'eventos'])->name('admin.eventos');
    Route::get('/financeiro', [AdminDashboardController::class, 'financeiro'])->name('admin.financeiro');
    Route::get('/suporte', [AdminDashboardController::class, 'suporte'])->name('admin.suporte');
    Route::get('/configuracoes', [AdminDashboardController::class, 'configuracoes'])->name('admin.configuracoes');
});
