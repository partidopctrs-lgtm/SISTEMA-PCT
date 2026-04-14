<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/admin/login', [DepartmentLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [DepartmentLoginController::class, 'login']);
Route::post('/admin/logout', [DepartmentLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
