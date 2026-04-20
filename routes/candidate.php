<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidate\CandidateDashboardController;
use App\Http\Controllers\Auth\DepartmentLoginController;

Route::get('/candidate/login', [DepartmentLoginController::class, 'showLoginForm'])->name('candidate.login');
Route::post('/candidate/login', [DepartmentLoginController::class, 'login']);

Route::domain('candidato.pct.social.br')->middleware(['auth', 'role:candidate'])->group(function () {
    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('candidate.dashboard');
    Route::get('/mapa-votos', [CandidateDashboardController::class, 'votes'])->name('candidate.votes');
    Route::get('/minha-equipe', [CandidateDashboardController::class, 'team'])->name('candidate.team');
    Route::get('/materiais', [CandidateDashboardController::class, 'materials'])->name('candidate.materials');
    Route::get('/modelos-oficios', [CandidateDashboardController::class, 'modelosOficios'])->name('candidate.modelos_oficios');
    
    // Novas rotas para remover mocks
    Route::post('/agenda', [CandidateDashboardController::class, 'storeEvent'])->name('candidate.events.store');
    Route::post('/equipe', [CandidateDashboardController::class, 'storeTeamMember'])->name('candidate.team.store');
    Route::post('/mensagem', [CandidateDashboardController::class, 'broadcastMessage'])->name('candidate.message.broadcast');
});
