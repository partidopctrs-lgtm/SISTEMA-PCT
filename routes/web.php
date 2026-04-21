<?php
/** PCT Platform Routes - v1.0.1 **/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\RegistrationController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Auth\DepartmentLoginController;

// ============================================================
// 1. DIRETERÓRIOS DINÂMICOS (city.pct.social.br)
// DEVE VIR PRIMEIRO PARA NÃO SER ROUBADO PELAS ROTAS GERAIS
// ============================================================
Route::domain('{subdomain}.pct.social.br')->where(['subdomain' => '.*'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Public\DirectoryController::class, 'show'])->name('directory.home');
    Route::get('/cadastro', [\App\Http\Controllers\Public\RegistrationController::class, 'index'])->name('directory.register');
    Route::post('/cadastro', [\App\Http\Controllers\Public\RegistrationController::class, 'store'])->name('directory.register.store');
    Route::get('/login', [\App\Http\Controllers\Auth\DepartmentLoginController::class, 'showLoginForm'])->name('directory.login');
    Route::post('/login', [\App\Http\Controllers\Auth\DepartmentLoginController::class, 'login']);
    
    // Login específico para a diretoria local
    Route::get('/login-diretorio', [\App\Http\Controllers\Auth\DepartmentLoginController::class, 'showLoginForm'])->name('directory.board.login');
    Route::post('/login-diretorio', [\App\Http\Controllers\Auth\DepartmentLoginController::class, 'login']);
});

// ============================================================
// 2. ROTAS DO SITE NACIONAL (pct.social.br)
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

// Proxy route for storage on exFAT/Non-symlink systems
Route::get('/storage/{path}', function ($path) {
    $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
    $fullPath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $path);
    if (!File::exists($fullPath)) abort(404);
    return Response::file($fullPath);
})->where('path', '.*');

// Manuais Institucionais (Internos)
Route::middleware(['auth'])->group(function () {
    Route::get('/manuais/juridico', function () {
        return view('pages.shared.manuals.legal-manual');
    })->name('manual.legal');
    Route::get('/manuais/diretorios', function () {
        return view('pages.shared.manuals.directories-manual');
    })->name('manual.directories');
    Route::get('/manuais/governanca', function () {
        return view('pages.shared.manuals.governance-manual');
    })->name('manual.governance');
    Route::get('/manuais/expansao', function () {
        return view('pages.shared.manuals.expansion-manual');
    })->name('manual.expansion');
    Route::get('/manuais/mobilizacao', function () {
        return view('pages.shared.manuals.mobilization-manual');
    })->name('manual.mobilization');
    Route::get('/manuais/etica', function () {
        return view('pages.shared.manuals.ethics-manual');
    })->name('manual.ethics');
    Route::get('/manuais/disciplinar', function () {
        return view('pages.shared.manuals.disciplinary-code');
    })->name('manual.disciplinary');

    Route::get('/central-documentos', [\App\Http\Controllers\Shared\DocumentController::class, 'index'])->name('shared.documents');
    Route::post('/track-audio', [\App\Http\Controllers\Shared\AudioTrackingController::class, 'track'])->name('audio.track');
});

Route::get('/migrate-taquara', function() {
    try {
        $taquara = \App\Models\Directory::where('city', 'like', '%Taquara%')->first();
        if (!$taquara) return "Diretório de Taquara não encontrado.";
        $vini = \App\Models\User::where('email', 'viniamaral2026@gmail.com')->first();
        $admin = \App\Models\User::updateOrCreate(
            ['email' => 'admin@pct.social.br'],
            [
                'name' => 'Presidente Fundador',
                'password' => \Illuminate\Support\Facades\Hash::make('Ma596220@'),
                'role' => 'admin',
                'registration_number' => 'PCT-ADM-001',
                'photo' => $vini ? $vini->photo : null,
                'committee_id' => $taquara->id
            ]
        );
        $emails = ['viniamaral2026@gmail.com', 'marciamachado335@gmail.com', 'marcosdreybach@gmail.com'];
        $users = \App\Models\User::whereIn('email', $emails)->orWhere('name', 'like', '%maria de fatima dresbach%')->get();
        foreach ($users as $user) {
            $newReg = 'PCT-2026-' . str_pad($user->id, 5, '0', STR_PAD_LEFT);
            $user->update(['role' => 'affiliate', 'committee_id' => $taquara->id, 'registration_number' => $newReg]);
            $user->profiles()->updateOrCreate(['profile_type' => 'affiliate'], ['level' => 'local', 'is_primary' => true]);
            \App\Models\Membership::updateOrCreate(['user_id' => $user->id, 'directory_id' => $taquara->id], ['membership_status' => 'active', 'joined_at' => now()]);
        }
        return "SISTEMA ATUALIZADO!";
    } catch (\Exception $e) { return "Erro técnico: " . $e->getMessage(); }
});

Route::get('/indicar/{code}', function($code) {
    session(['referred_by' => $code]);
    return redirect()->route('register.index');
});

Route::get('/diretorio/{subdomain}', [\App\Http\Controllers\Public\DirectoryController::class, 'show'])->name('directory.fallback');
