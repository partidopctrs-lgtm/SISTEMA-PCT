<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Affiliate\AffiliateDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;



Route::domain('afiliado.pct.social.br')->middleware(['auth', 'role:affiliate'])->group(function () {
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
});
