<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Affiliate\AffiliateDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;



$affiliateDomains = ['afiliado.pct.social.br', 'afiliado.localhost'];
foreach ($affiliateDomains as $domain) {
    Route::domain($domain)->middleware(['auth', 'role:affiliate'])->group(function () {
    Route::get('/dashboard', [AffiliateDashboardController::class, 'index'])->name('affiliate.dashboard');
    Route::get('/perfil', [AffiliateDashboardController::class, 'profile'])->name('affiliate.profile');
    Route::post('/perfil', [AffiliateDashboardController::class, 'updateProfile'])->name('affiliate.profile.update');
    Route::post('/perfil/photo', [AffiliateDashboardController::class, 'updatePhoto'])->name('affiliate.profile.photo');
    Route::get('/carteirinha', [AffiliateDashboardController::class, 'carteirinha'])->name('affiliate.carteirinha');
    Route::get('/carteirinha/comprovante', [AffiliateDashboardController::class, 'comprovante'])->name('affiliate.carteirinha.comprovante');
    Route::get('/escola', [AffiliateDashboardController::class, 'escola'])->name('affiliate.escola');
    Route::get('/escola/aula/{id}', [AffiliateDashboardController::class, 'aula'])->name('affiliate.escola.aula');
    Route::post('/escola/aula/{id}/check', [AffiliateDashboardController::class, 'checkAula'])->name('affiliate.escola.aula.check');
    Route::get('/escola/certificado', [AffiliateDashboardController::class, 'certificado'])->name('affiliate.escola.certificado');
    Route::get('/missoes', [AffiliateDashboardController::class, 'missoes'])->name('affiliate.missoes');
    Route::get('/convites', [AffiliateDashboardController::class, 'convites'])->name('affiliate.convites');
    Route::post('/convites/cadastrar', [AffiliateDashboardController::class, 'storeManualRegistration'])->name('affiliate.convites.store');
    Route::get('/comunidade', [\App\Http\Controllers\Affiliate\CommunityController::class, 'index'])->name('affiliate.community.index');
    Route::get('/comunidade/novo', [\App\Http\Controllers\Affiliate\CommunityController::class, 'create'])->name('affiliate.community.create');
    Route::post('/comunidade/novo', [\App\Http\Controllers\Affiliate\CommunityController::class, 'store'])->name('affiliate.community.store');
    Route::get('/comunidade/topico/{id}', [\App\Http\Controllers\Affiliate\CommunityController::class, 'show'])->name('affiliate.community.show');
    Route::post('/comunidade/topico/{id}/post', [\App\Http\Controllers\Affiliate\CommunityController::class, 'storePost'])->name('affiliate.community.post.store');
    Route::get('/documentos', [AffiliateDashboardController::class, 'documentos'])->name('affiliate.documentos');
    Route::post('/documentos/poll', [AffiliateDashboardController::class, 'documentPoll'])->name('affiliate.document.poll');
    Route::get('/modelos-oficios', [AffiliateDashboardController::class, 'modelosOficios'])->name('affiliate.modelos_oficios');
    Route::get('/ficha-de-apoio', [AffiliateDashboardController::class, 'membershipForm'])->name('affiliate.membership_form');
    Route::get('/eventos', [AffiliateDashboardController::class, 'eventos'])->name('affiliate.eventos');
    Route::get('/financeiro', [AffiliateDashboardController::class, 'financeiro'])->name('affiliate.financeiro');
    Route::get('/suporte', [AffiliateDashboardController::class, 'suporte'])->name('affiliate.suporte');
    Route::post('/suporte/legal', [AffiliateDashboardController::class, 'storeLegalRequest'])->name('affiliate.suporte.legal.store');
    Route::get('/configuracoes', [AffiliateDashboardController::class, 'configuracoes'])->name('affiliate.configuracoes');
    
    // Módulo de Missões Dinâmicas
    Route::get('/missao/{slug}', [\App\Http\Controllers\Affiliate\MissionController::class, 'show'])->name('affiliate.mission.show');
    Route::post('/missao/{slug}/participar', [\App\Http\Controllers\Affiliate\MissionController::class, 'participate'])->name('affiliate.mission.participate');
    Route::post('/missao/{slug}/evidencia', [\App\Http\Controllers\Affiliate\MissionController::class, 'submitEvidence'])->name('affiliate.mission.evidence');

    // Módulo de Quiz e Avaliação
    Route::get('/quiz/manifesto', [\App\Http\Controllers\Affiliate\QuizController::class, 'manifesto'])->name('affiliate.quiz.manifesto');
    Route::post('/quiz/manifesto/submit', [\App\Http\Controllers\Affiliate\QuizController::class, 'submitManifesto'])->name('affiliate.quiz.manifesto.submit');

    // Módulo Partido em Formação (Assinaturas)
    Route::get('/assinaturas', [\App\Http\Controllers\Affiliate\PartySignatureController::class, 'create'])->name('affiliate.signatures.create');
    Route::post('/assinaturas', [\App\Http\Controllers\Affiliate\PartySignatureController::class, 'store'])->name('affiliate.signatures.store');

    // Módulo Demandas da População
    Route::get('/demandas', [\App\Http\Controllers\Affiliate\PublicDemandController::class, 'create'])->name('affiliate.demands.create');
    Route::post('/demandas', [\App\Http\Controllers\Affiliate\PublicDemandController::class, 'store'])->name('affiliate.demands.store');

    // 📈 Módulo de Desempenho
    Route::prefix('desempenho')->name('affiliate.desempenho.')->group(function () {
        Route::get('/estatisticas', [AffiliateDashboardController::class, 'index'])->name('estatisticas');
        Route::get('/relatorios', [AffiliateDashboardController::class, 'index'])->name('relatorios');
        Route::get('/conversoes', [AffiliateDashboardController::class, 'index'])->name('conversoes');
    });

    // 🔗 Módulo de Divulgação
    Route::prefix('divulgacao')->name('affiliate.divulgacao.')->group(function () {
        Route::get('/gerador', [\App\Http\Controllers\Affiliate\CampaignManagementController::class, 'generator'])->name('gerador');
        Route::get('/qrcode', [\App\Http\Controllers\Affiliate\CampaignManagementController::class, 'generator'])->name('qrcode');
        Route::get('/compartilhar', [\App\Http\Controllers\Affiliate\CampaignManagementController::class, 'generator'])->name('compartilhar');
    });

    // 🧾 Módulo de Relatos / Atendimento PCT
    Route::prefix('atendimento')->name('affiliate.atendimento.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Affiliate\AtendimentoController::class, 'index'])->name('index');
        Route::get('/novo', [\App\Http\Controllers\Affiliate\AtendimentoController::class, 'create'])->name('create');
        Route::post('/enviar', [\App\Http\Controllers\Affiliate\AtendimentoController::class, 'store'])->name('store');
        Route::get('/acompanhar/{id}', [\App\Http\Controllers\Affiliate\AtendimentoController::class, 'show'])->name('show');
        Route::get('/direitos', [\App\Http\Controllers\Affiliate\AtendimentoController::class, 'rights'])->name('rights');
    });

    // 🧑🤝🧑 Módulo de Comunidade PCT (Fórum)
    Route::prefix('forum')->name('affiliate.forum.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Affiliate\ForumController::class, 'index'])->name('index');
        Route::get('/topico/novo', [\App\Http\Controllers\Affiliate\ForumController::class, 'create'])->name('create');
        Route::post('/topico/enviar', [\App\Http\Controllers\Affiliate\ForumController::class, 'storeTopic'])->name('store');
        Route::get('/topico/{id}', [\App\Http\Controllers\Affiliate\ForumController::class, 'show'])->name('show');
        Route::post('/topico/{id}/comentar', [\App\Http\Controllers\Affiliate\ForumController::class, 'storeComment'])->name('comment');
        Route::post('/topico/{id}/like', [\App\Http\Controllers\Affiliate\ForumController::class, 'toggleLike'])->name('like');
    });

    // 📢 Módulo de Materiais
    Route::prefix('materiais')->name('affiliate.materiais.')->group(function () {
        Route::get('/artes', [\App\Http\Controllers\Affiliate\CampaignManagementController::class, 'materials'])->name('artes');
        Route::get('/textos', [\App\Http\Controllers\Affiliate\CampaignManagementController::class, 'materials'])->name('textos');
        Route::get('/downloads', [\App\Http\Controllers\Affiliate\CampaignManagementController::class, 'materials'])->name('downloads');
    });

    // 🏆 Módulo de Engajamento
    Route::prefix('engajamento')->name('affiliate.engajamento.')->group(function () {
        Route::get('/ranking', [\App\Http\Controllers\Affiliate\CampaignManagementController::class, 'ranking'])->name('ranking');
        Route::get('/metas', [\App\Http\Controllers\Affiliate\CampaignManagementController::class, 'ranking'])->name('metas');
    });
    });
}
