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
// ============================================================
// 1. SITE NACIONAL (Prioridade Máxima nos domínios fixos)
// ============================================================
Route::domain('{domain}')->where(['domain' => '(^pct\.social\.br$|^www\.pct\.social\.br$|^localhost$|^127\.0\.0\.1$|.*:8002.*)'])->group(function () {
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

    // Redirecionamento de rotas antigas para o login unificado
    Route::get('/admin/login', fn() => redirect('/login'));
    Route::get('/committee/login', fn() => redirect('/login'));
    Route::get('/candidate/login', fn() => redirect('/login'));
    Route::get('/legal/login', fn() => redirect('/login'));
    Route::get('/finance/login', fn() => redirect('/login'));
    Route::get('/cadastro/sucesso', [RegistrationController::class, 'success'])->name('register.success');
    Route::get('/cadastro/verificar/{token}', [\App\Http\Controllers\Public\VerifyEmailController::class, 'verify'])->name('register.verify');
    Route::get('/politica-de-privacidade', [HomeController::class, 'privacy'])->name('privacy');
    Route::get('/termos-de-uso', [HomeController::class, 'terms'])->name('terms');

    // Recuperação de Senha
    Route::get('/esqueci-minha-senha', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/esqueci-minha-senha', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/redefinir-senha/{token}', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/redefinir-senha', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'reset'])->name('password.update');

    Route::get('/agua-rs', [\App\Http\Controllers\Public\WaterCampaignController::class, 'index'])->name('campaign.water.index');
    Route::post('/agua-rs', [\App\Http\Controllers\Public\WaterCampaignController::class, 'store'])->name('campaign.water.store');

    // Projeto de Lei SNDAH 2026
    Route::get('/PL_SNDAH_PCT_2026', function () {
        return view('propostas.sndah');
    })->name('proposta.sndah');

    // Abaixo-Assinado SNDAH
    Route::get('/abaixo-assinado', [\App\Http\Controllers\Public\PetitionController::class, 'show'])->name('petition.show');
    Route::post('/abaixo-assinado', [\App\Http\Controllers\Public\PetitionController::class, 'store'])->name('petition.store');
});

// ============================================================
// 2. PAINEL DO AFILIADO (afiliado.pct.social.br)
// ============================================================

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

    // ✅ Apoio Partidário — Decisão Opcional e Reversível (Global)
    Route::post('/apoio-partido/salvar', [\App\Http\Controllers\Affiliate\ApoioPartidoController::class, 'salvar'])->name('affiliate.apoio.salvar');
    Route::post('/apoio-partido/alterar', [\App\Http\Controllers\Affiliate\ApoioPartidoController::class, 'alterar'])->name('affiliate.apoio.alterar');
});

Route::get('/indicar/{code}', function($code) {
    session(['referred_by' => $code]);
    return redirect()->route('register.index');
});
