<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Affiliate\AffiliateDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/affiliate/login', [DepartmentLoginController::class, 'showLoginForm'])->name('affiliate.login');
Route::post('/affiliate/login', [DepartmentLoginController::class, 'login']);

Route::middleware(['auth', 'role:affiliate'])->prefix('affiliate')->group(function () {
    Route::get('/dashboard', [AffiliateDashboardController::class, 'index'])->name('affiliate.dashboard');
    Route::get('/perfil', [AffiliateDashboardController::class, 'profile'])->name('affiliate.profile');
    Route::get('/carteirinha', [AffiliateDashboardController::class, 'carteirinha'])->name('affiliate.carteirinha');
    Route::get('/escola', [AffiliateDashboardController::class, 'escola'])->name('affiliate.escola');
    Route::get('/missoes', [AffiliateDashboardController::class, 'missoes'])->name('affiliate.missoes');
    Route::get('/convites', [AffiliateDashboardController::class, 'convites'])->name('affiliate.convites');
    Route::get('/comunidade', [AffiliateDashboardController::class, 'comunidade'])->name('affiliate.comunidade');
    Route::get('/documentos', [AffiliateDashboardController::class, 'documentos'])->name('affiliate.documentos');
    Route::get('/ficha-de-apoio', [AffiliateDashboardController::class, 'membershipForm'])->name('affiliate.membership_form');
    Route::get('/eventos', [AffiliateDashboardController::class, 'eventos'])->name('affiliate.eventos');
    Route::get('/financeiro', [AffiliateDashboardController::class, 'financeiro'])->name('affiliate.financeiro');
    Route::get('/suporte', [AffiliateDashboardController::class, 'suporte'])->name('affiliate.suporte');
    Route::get('/configuracoes', [AffiliateDashboardController::class, 'configuracoes'])->name('affiliate.configuracoes');
});
