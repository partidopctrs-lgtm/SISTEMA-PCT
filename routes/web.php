<?php
/** PCT Platform Routes - v1.0.1 **/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\RegistrationController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/manifesto', [HomeController::class, 'manifesto'])->name('manifesto');
Route::get('/estatuto', [HomeController::class, 'estatuto'])->name('estatuto');
Route::get('/cartilha', [HomeController::class, 'booklet'])->name('cartilha');
Route::get('/propostas', [HomeController::class, 'proposals'])->name('propostas');
Route::get('/codigo-de-etica', [HomeController::class, 'ethics'])->name('ethics');
Route::get('/modelos-oficios', [HomeController::class, 'modelosOficios'])->name('modelos-oficios');
Route::get('/cadastro', [RegistrationController::class, 'index'])->name('register.index');
Route::post('/cadastro', [RegistrationController::class, 'store'])->name('register.store');

// Main Authenticated Portals Entries
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/login', [DepartmentLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [DepartmentLoginController::class, 'login']);

Route::get('/cadastro/sucesso', [RegistrationController::class, 'success'])->name('register.success');
