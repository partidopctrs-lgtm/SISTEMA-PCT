<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\User;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        return response()->json(Goal::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:state,city',
            'location_name' => 'required|string',
            'target_members' => 'required|integer|min:1',
            'deadline' => 'nullable|date',
        ]);

        $goal = Goal::create($validated);

        return response()->json($goal, 201);
    }

    public function show(Goal $goal)
    {
        // Update current members count dynamically
        if ($goal->type === 'state') {
            $goal->current_members = User::where('state', $goal->location_name)->count();
        } else {
            $goal->current_members = User::where('city', $goal->location_name)->count();
        }
        $goal->save();

        return response()->json($goal);
    }

    public function updateProgress()
    {
        $goals = Goal::all();
        foreach ($goals as $goal) {
            if ($goal->type === 'state') {
                $goal->current_members = User::where('state', $goal->location_name)->count();
            } else {
                $goal->current_members = User::where('city', $goal->location_name)->count();
            }
            
            // Auto-update status
            $ratio = $goal->current_members / $goal->target_members;
            if ($ratio >= 0.8) {
                $goal->status = 'on_track';
            } elseif ($ratio >= 0.5) {
                $goal->status = 'at_risk';
            } else {
                $goal->status = 'critical';
            }
            
            $goal->save();
        }

        return response()->json(['message' => 'All goals updated successfully.']);
    }
}
