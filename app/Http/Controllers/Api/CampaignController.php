<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        return response()->json(Campaign::orderBy('scheduled_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'type' => 'required|in:email,push,whatsapp,social',
            'recurrency' => 'required|string',
            'scheduled_at' => 'required|date',
        ]);

        $campaign = Campaign::create($validated);

        return response()->json($campaign, 201);
    }

    public function show(Campaign $campaign)
    {
        return response()->json($campaign);
    }

    public function updateMetrics(Request $request, Campaign $campaign)
    {
        $validated = $request->validate([
            'metrics' => 'required|array',
        ]);

        $campaign->metrics = $validated['metrics'];
        $campaign->save();

        return response()->json($campaign);
    }
}
