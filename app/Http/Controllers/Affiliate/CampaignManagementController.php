<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\WaterReport;
use App\Models\CampaignClick;
use Illuminate\Http\Request;

class CampaignManagementController extends Controller
{
    /**
     * Lista detalhada de todos os relatos gerados pelo afiliado
     */
    public function reportsList()
    {
        $user = auth()->user();
        $reports = WaterReport::where('affiliate_id', $user->id)->latest()->paginate(15);
        return view('pages.affiliate.campaign.reports-list', compact('reports'));
    }

    /**
     * Ranking completo de mobilizadores
     */
    public function ranking()
    {
        $ranking = WaterReport::selectRaw('affiliate_id, count(*) as total')
            ->whereNotNull('affiliate_id')
            ->groupBy('affiliate_id')
            ->orderByDesc('total')
            ->with('affiliate:id,name,photo')
            ->paginate(20);
            
        return view('pages.affiliate.campaign.ranking', compact('ranking'));
    }

    /**
     * Materiais de divulgação (Artes e Textos)
     */
    public function materials()
    {
        return view('pages.affiliate.campaign.materials');
    }

    /**
     * Gerador de QR Code e Links
     */
    public function generator()
    {
        return view('pages.affiliate.campaign.generator');
    }
}
