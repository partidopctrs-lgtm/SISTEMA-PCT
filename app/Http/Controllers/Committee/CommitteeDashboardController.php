<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommitteeDashboardController extends Controller
{
    public function index()
    {
        $directoryId = auth()->user()->committee_id; // Assume current logic for now
        $directory = \App\Models\Directory::find($directoryId);

        $stats = [
            'members' => \App\Models\Membership::where('directory_id', $directoryId)->count(),
            'revenue' => \App\Models\FinancialRecord::where('directory_id', $directoryId)->where('type', 'revenue')->where('status', 'approved')->sum('amount'),
            'expenses' => \App\Models\FinancialRecord::where('directory_id', $directoryId)->where('type', 'expense')->where('status', 'approved')->sum('amount'),
            'pending_tasks' => \App\Models\Task::where('committee_id', $directoryId)->whereNotIn('status', ['completed', 'cancelled'])->count(),
        ];

        return view('pages.committee.dashboard', compact('directory', 'stats'));
    }

    public function members()
    {
        $directoryId = auth()->user()->committee_id;
        $members = \App\Models\Membership::with('user')->where('directory_id', $directoryId)->paginate(20);
        return view('pages.committee.members', compact('members'));
    }

    public function financial()
    {
        $directoryId = auth()->user()->committee_id;
        $records = \App\Models\FinancialRecord::where('directory_id', $directoryId)->orderBy('created_at', 'desc')->paginate(20);
        return view('pages.committee.financial', compact('records'));
    }

    public function storeFinancialRecord(Request $request)
    {
        $request->validate([
            'type' => 'required|in:revenue,expense',
            'category' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'required|string',
        ]);

        \App\Models\FinancialRecord::create([
            'directory_id' => auth()->user()->committee_id,
            'type' => $request->type,
            'category' => $request->category,
            'amount' => $request->amount,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Registro financeiro enviado para aprovação.');
    }
}
