<?php
/** PCT Platform Routes - v1.0.1 **/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\RegistrationController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Auth\DepartmentLoginController;

// ============================================================
// 1. DIRETÓRIOS DINÂMICOS (Qualquer subdomínio que não seja o principal)
// ============================================================
Route::domain('{subdomain}.pct.social.br')->group(function () {
    Route::get('/', [\App\Http\Controllers\Public\DirectoryController::class, 'show'])->name('directory.home');
    Route::get('/cadastro', [\App\Http\Controllers\Public\RegistrationController::class, 'index'])->name('directory.register');
    Route::post('/cadastro', [\App\Http\Controllers\Public\RegistrationController::class, 'store'])->name('directory.register.store');
    Route::get('/login', [\App\Http\Controllers\Auth\DepartmentLoginController::class, 'showLoginForm'])->name('directory.login');
    Route::post('/login', [\App\Http\Controllers\Auth\DepartmentLoginController::class, 'login']);
});

// ============================================================
// 2. SITE NACIONAL (Geral)
// ============================================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/manifesto', [HomeController::class, 'manifesto'])->name('manifesto');
Route::get('/estatuto', [HomeController::class, 'estatuto'])->name('estatuto');
Route::get('/cartilha', [HomeController::class, 'booklet'])->name('cartilha');
Route::get('/propostas', [HomeController::class, 'proposals'])->name('propostas');
Route::get('/codigo-de-etica', [HomeController::class, 'ethics'])->name('ethics');
Route::get('/modelos-oficios', [HomeController::class, 'modelosOficios'])->name('modelos-oficios');
Route::get('/cadastro', [RegistrationController::class, 'index'])->name('register.index');
Route::post('/cadastro', [RegistrationController::class, 'store'])->name('register.store');
Route::get('/login', [DepartmentLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [DepartmentLoginController::class, 'login']);
Route::get('/cadastro/sucesso', [RegistrationController::class, 'success'])->name('register.success');

// Proxy route for storage
Route::get('/storage/{path}', function ($path) {
    $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
    $fullPath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $path);
    if (!File::exists($fullPath)) abort(404);
    return Response::file($fullPath);
})->where('path', '.*');

Route::get('/indicar/{code}', function($code) {
    session(['referred_by' => $code]);
    return redirect()->route('register.index');
});
