<?php

use App\Http\Controllers\Api\AffiliationController;
use App\Http\Controllers\Api\GoalController;
use App\Http\Controllers\Api\PointController;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\VotingController;
use App\Http\Controllers\Api\PromotionController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Public routes
    Route::post('/register', [AffiliationController::class, 'register']);
    Route::get('/verify-protocol', [AffiliationController::class, 'verifyProtocol']);

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (\Illuminate\Http\Request $request) {
            return $request->user();
        });

        Route::post('/sign-document', [AffiliationController::class, 'signDocument']);
        
        Route::get('/documents/support-pdf', [DocumentController::class, 'generateSupportPdf']);
        Route::get('/documents/support-pdf/stream', [DocumentController::class, 'streamSupportPdf']);
        
        Route::get('/goals', [GoalController::class, 'index']);
        Route::get('/goals/{goal}', [GoalController::class, 'show']);
        Route::post('/goals', [GoalController::class, 'store']);
        Route::post('/goals/update-progress', [GoalController::class, 'updateProgress']);

        Route::get('/points', [PointController::class, 'index']);
        Route::get('/ranking', [PointController::class, 'ranking']);
        Route::post('/points/award', [PointController::class, 'awardPoints']);

        Route::get('/campaigns', [CampaignController::class, 'index']);
        Route::post('/campaigns', [CampaignController::class, 'store']);
        Route::post('/campaigns/{campaign}/metrics', [CampaignController::class, 'updateMetrics']);

        Route::get('/voting', [VotingController::class, 'index']);
        Route::post('/voting/cast', [VotingController::class, 'castVote']);
        Route::get('/voting/{election}/results', [VotingController::class, 'results']);

        Route::post('/promotions/submit', [PromotionController::class, 'submit']);
        Route::get('/promotions', [PromotionController::class, 'index']); // Admin
        Route::post('/promotions/{promotionRequest}/review', [PromotionController::class, 'review']); // Admin
    });
});
