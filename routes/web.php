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
foreach ($mainDomains as $index => $domain) {
    Route::domain($domain)->group(function () use ($index) {
        $namePrefix = ($index === 0) ? '' : 'www.';
        
        Route::get('/', [HomeController::class, 'index'])->name($index === 0 ? 'home' : 'home.www');
        Route::get('/manifesto', [HomeController::class, 'manifesto'])->name($index === 0 ? 'manifesto' : 'manifesto.www');
        Route::get('/estatuto', [HomeController::class, 'estatuto'])->name($index === 0 ? 'estatuto' : 'estatuto.www');
        Route::get('/cartilha', [HomeController::class, 'booklet'])->name($index === 0 ? 'cartilha' : 'cartilha.www');
        Route::get('/propostas', [HomeController::class, 'proposals'])->name($index === 0 ? 'propostas' : 'propostas.www');
        Route::get('/codigo-de-etica', [HomeController::class, 'ethics'])->name($index === 0 ? 'ethics' : 'ethics.www');
        Route::get('/modelos-oficios', [HomeController::class, 'modelosOficios'])->name($index === 0 ? 'modelos-oficios' : 'modelos-oficios.www');
        Route::get('/cadastro', [RegistrationController::class, 'index'])->name($index === 0 ? 'register.index' : 'register.index.www');
        Route::post('/cadastro', [RegistrationController::class, 'store'])->name($index === 0 ? 'register.store' : 'register.store.www');
        Route::get('/login', [DepartmentLoginController::class, 'showLoginForm'])->name($index === 0 ? 'login' : 'login.www');
        Route::post('/login', [DepartmentLoginController::class, 'login']);
        Route::get('/cadastro/sucesso', [RegistrationController::class, 'success'])->name($index === 0 ? 'register.success' : 'register.success.www');
        Route::get('/cadastro/verificar/{token}', [\App\Http\Controllers\Public\VerifyEmailController::class, 'verify'])->name($index === 0 ? 'register.verify' : 'register.verify.www');
        Route::get('/politica-de-privacidade', [HomeController::class, 'privacy'])->name($index === 0 ? 'privacy' : 'privacy.www');
        Route::get('/termos-de-uso', [HomeController::class, 'terms'])->name($index === 0 ? 'terms' : 'terms.www');

        // Recuperação de Senha
        Route::get('/esqueci-minha-senha', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name($index === 0 ? 'password.request' : 'password.request.www');
        Route::post('/esqueci-minha-senha', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name($index === 0 ? 'password.email' : 'password.email.www');
        Route::get('/redefinir-senha/{token}', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetForm'])->name($index === 0 ? 'password.reset' : 'password.reset.www');
        Route::post('/redefinir-senha', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'reset'])->name($index === 0 ? 'password.update' : 'password.update.www');

        Route::get('/agua-rs', [\App\Http\Controllers\Public\WaterCampaignController::class, 'index'])->name($index === 0 ? 'campaign.water.index' : 'campaign.water.index.www');
        Route::post('/agua-rs', [\App\Http\Controllers\Public\WaterCampaignController::class, 'store'])->name($index === 0 ? 'campaign.water.store' : 'campaign.water.store.www');
    });
}

// ============================================================
// 2. PAINEL DO AFILIADO (afiliado.pct.social.br)
// ============================================================
Route::domain('afiliado.pct.social.br')->name('affiliate.')->middleware(['web', 'auth', 'role:affiliate'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Affiliate\AffiliateDashboardController::class, 'index'])->name('dashboard');
    Route::get('/perfil', [App\Http\Controllers\Affiliate\AffiliateDashboardController::class, 'profile'])->name('profile');
    Route::post('/perfil', [App\Http\Controllers\Affiliate\AffiliateDashboardController::class, 'updateProfile'])->name('profile.update');
    Route::get('/carteirinha', [App\Http\Controllers\Affiliate\AffiliateDashboardController::class, 'index'])->name('carteirinha');

    // 📈 Módulo de Desempenho
    Route::prefix('desempenho')->name('desempenho.')->group(function () {
        Route::get('/estatisticas', [App\Http\Controllers\Affiliate\AffiliateDashboardController::class, 'index'])->name('estatisticas');
        Route::get('/relatorios', [App\Http\Controllers\Affiliate\AffiliateDashboardController::class, 'index'])->name('relatorios');
        Route::get('/conversoes', [App\Http\Controllers\Affiliate\AffiliateDashboardController::class, 'index'])->name('conversoes');
    });

    // 🔗 Módulo de Divulgação
    Route::prefix('divulgacao')->name('divulgacao.')->group(function () {
        Route::get('/gerador', [App\Http\Controllers\Affiliate\CampaignManagementController::class, 'generator'])->name('gerador');
        Route::get('/qrcode', [App\Http\Controllers\Affiliate\CampaignManagementController::class, 'generator'])->name('qrcode');
        Route::get('/compartilhar', [App\Http\Controllers\Affiliate\CampaignManagementController::class, 'generator'])->name('compartilhar');
    });

    // 🧾 Módulo de Relatos / Atendimento PCT
    Route::prefix('atendimento')->name('atendimento.')->group(function () {
        Route::get('/', [App\Http\Controllers\Affiliate\AtendimentoController::class, 'index'])->name('index');
        Route::get('/novo', [App\Http\Controllers\Affiliate\AtendimentoController::class, 'create'])->name('create');
        Route::post('/enviar', [App\Http\Controllers\Affiliate\AtendimentoController::class, 'store'])->name('store');
        Route::get('/acompanhar/{id}', [App\Http\Controllers\Affiliate\AtendimentoController::class, 'show'])->name('show');
        Route::get('/direitos', [App\Http\Controllers\Affiliate\AtendimentoController::class, 'rights'])->name('rights');
    });

    // 🧑🤝🧑 Módulo de Comunidade PCT (Fórum)
    Route::prefix('comunidade')->name('forum.')->group(function () {
        Route::get('/', [App\Http\Controllers\Affiliate\ForumController::class, 'index'])->name('index');
        Route::get('/topico/novo', [App\Http\Controllers\Affiliate\ForumController::class, 'create'])->name('create');
        Route::post('/topico/enviar', [App\Http\Controllers\Affiliate\ForumController::class, 'storeTopic'])->name('store');
        Route::get('/topico/{id}', [App\Http\Controllers\Affiliate\ForumController::class, 'show'])->name('show');
        Route::post('/topico/{id}/comentar', [App\Http\Controllers\Affiliate\ForumController::class, 'storeComment'])->name('comment');
        Route::post('/topico/{id}/like', [App\Http\Controllers\Affiliate\ForumController::class, 'toggleLike'])->name('like');
    });

    // 📢 Módulo de Materiais
    Route::prefix('materiais')->name('materiais.')->group(function () {
        Route::get('/artes', [App\Http\Controllers\Affiliate\CampaignManagementController::class, 'materials'])->name('artes');
        Route::get('/textos', [App\Http\Controllers\Affiliate\CampaignManagementController::class, 'materials'])->name('textos');
        Route::get('/downloads', [App\Http\Controllers\Affiliate\CampaignManagementController::class, 'materials'])->name('downloads');
    });

    // 🏆 Módulo de Engajamento
    Route::prefix('engajamento')->name('engajamento.')->group(function () {
        Route::get('/ranking', [App\Http\Controllers\Affiliate\CampaignManagementController::class, 'ranking'])->name('ranking');
        Route::get('/metas', [App\Http\Controllers\Affiliate\CampaignManagementController::class, 'ranking'])->name('metas');
    });

    // Apoio ao Partido
    Route::prefix('apoio')->name('signatures.')->group(function () {
        Route::get('/registrar', [App\Http\Controllers\Affiliate\PartySignatureController::class, 'create'])->name('create');
        Route::post('/registrar', [App\Http\Controllers\Affiliate\PartySignatureController::class, 'store'])->name('store');
    });
});

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
