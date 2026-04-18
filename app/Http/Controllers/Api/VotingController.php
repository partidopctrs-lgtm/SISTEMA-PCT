<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    /**
     * List open elections.
     */
    public function index()
    {
        $now = now();
        $elections = Election::where('status', 'open')
            ->where('start_at', '<=', $now)
            ->where('end_at', '>=', $now)
            ->get();

        return response()->json($elections);
    }

    /**
     * Cast a vote.
     */
    public function castVote(Request $request)
    {
        $validated = $request->validate([
            'election_id' => 'required|exists:elections,id',
            'candidate_id' => 'required|exists:users,id',
        ]);

        $user = $request->user();

        // Check if already voted
        $existingVote = Vote::where('election_id', $validated['election_id'])
            ->where('user_id', $user->id)
            ->first();

        if ($existingVote) {
            return response()->json(['error' => 'You have already voted in this election.'], 403);
        }

        $vote = Vote::create([
            'election_id' => $validated['election_id'],
            'user_id' => $user->id,
            'candidate_id' => $validated['candidate_id'],
        ]);

        return response()->json(['message' => 'Vote cast successfully.', 'vote' => $vote], 201);
    }

    /**
     * Get election results.
     */
    public function results(Election $election)
    {
        if ($election->status !== 'closed' && $election->end_at > now()) {
            return response()->json(['error' => 'Results are not available until the election is closed.'], 403);
        }

        $results = Vote::where('election_id', $election->id)
            ->select('candidate_id', DB::raw('count(*) as votes'))
            ->groupBy('candidate_id')
            ->with('candidate:id,name')
            ->orderBy('votes', 'desc')
            ->get();

        return response()->json([
            'election' => $election->title,
            'total_votes' => Vote::where('election_id', $election->id)->count(),
            'results' => $results
        ]);
    }
}
