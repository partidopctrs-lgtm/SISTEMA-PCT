<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $points = Point::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $total = $points->sum('amount');

        return response()->json([
            'total_points' => $total,
            'history' => $points
        ]);
    }

    public function awardPoints(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer',
            'reason' => 'required|string',
        ]);

        $point = Point::create($validated);

        return response()->json($point, 201);
    }

    public function ranking()
    {
        $ranking = User::select('users.id', 'users.name', 'users.photo', DB::raw('SUM(points.amount) as total_points'))
            ->join('points', 'users.id', '=', 'points.user_id')
            ->groupBy('users.id', 'users.name', 'users.photo')
            ->orderBy('total_points', 'desc')
            ->limit(10)
            ->get();

        return response()->json($ranking);
    }
}
