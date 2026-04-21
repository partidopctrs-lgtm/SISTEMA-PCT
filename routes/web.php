<?php
/** PCT Platform Routes - v1.0.1 **/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\RegistrationController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Auth\DepartmentLoginController;

// ============================================================
// 1. SITE NACIONAL (Prioridade Máxima nos domínios fixos)
// ============================================================
$mainDomains = ['pct.social.br', 'www.pct.social.br'];
foreach ($mainDomains as $domain) {
    Route::domain($domain)->group(function () {
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
        Route::get('/politica-de-privacidade', [HomeController::class, 'privacy'])->name('privacy');
        Route::get('/termos-de-uso', [HomeController::class, 'terms'])->name('terms');

        // Recuperação de Senha
        Route::get('/esqueci-minha-senha', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('/esqueci-minha-senha', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('/redefinir-senha/{token}', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('/redefinir-senha', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'reset'])->name('password.update');

        // Campanha Água no RS
        Route::get('/agua-rs', [\App\Http\Controllers\Public\WaterCampaignController::class, 'index'])->name('campaign.water.index');
        Route::post('/agua-rs', [\App\Http\Controllers\Public\WaterCampaignController::class, 'store'])->name('campaign.water.store');
    });
}

// ============================================================
// 2. DIRETÓRIOS DINÂMICOS (city.pct.social.br)
// ============================================================
Route::domain('{subdomain}.pct.social.br')->group(function () {
    Route::get('/', [\App\Http\Controllers\Public\DirectoryController::class, 'show'])->name('directory.home');
    Route::get('/cadastro', [\App\Http\Controllers\Public\RegistrationController::class, 'index'])->name('directory.register');
    Route::post('/cadastro', [\App\Http\Controllers\Public\RegistrationController::class, 'store'])->name('directory.register.store');
    Route::get('/login', [\App\Http\Controllers\Auth\DepartmentLoginController::class, 'showLoginForm'])->name('directory.login');
    Route::post('/login', [\App\Http\Controllers\Auth\DepartmentLoginController::class, 'login']);
});

// ============================================================
// 3. ROTAS GLOBAIS (Funcionam em qualquer lugar)
// ============================================================
Route::post('/track-audio', [\App\Http\Controllers\Shared\AudioTrackingController::class, 'track'])->name('audio.track');

Route::get('/storage/{path}', function ($path) {
    $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
    $fullPath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $path);
    if (!File::exists($fullPath)) abort(404);
    return Response::file($fullPath);
})->where('path', '.*');

Route::middleware(['auth'])->group(function () {
    Route::get('/manuais/juridico', function () { return view('pages.shared.manuals.legal-manual'); })->name('manual.legal');
    Route::get('/manuais/diretorios', function () { return view('pages.shared.manuals.directories-manual'); })->name('manual.directories');
    Route::get('/manuais/governanca', function () { return view('pages.shared.manuals.governance-manual'); })->name('manual.governance');
    Route::get('/manuais/expansao', function () { return view('pages.shared.manuals.expansion-manual'); })->name('manual.expansion');
    Route::get('/manuais/mobilizacao', function () { return view('pages.shared.manuals.mobilization-manual'); })->name('manual.mobilization');
    Route::get('/manuais/etica', function () { return view('pages.shared.manuals.ethics-manual'); })->name('manual.ethics');
    Route::get('/manuais/disciplinar', function () { return view('pages.shared.manuals.disciplinary-code'); })->name('manual.disciplinary');
    Route::get('/central-documentos', [\App\Http\Controllers\Shared\DocumentController::class, 'index'])->name('shared.documents');
});

Route::get('/indicar/{code}', function($code) {
    session(['referred_by' => $code]);
    return redirect()->route('register.index');
});
