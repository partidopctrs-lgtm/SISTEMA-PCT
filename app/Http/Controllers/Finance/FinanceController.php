<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FinancialRecord;

class FinanceController extends Controller
{
    public function index()
    {
        $entrances = FinancialRecord::where('type', 'revenue')->where('status', 'approved')->sum('amount');
        $exits = FinancialRecord::where('type', 'expense')->where('status', 'approved')->sum('amount');
        $balance = $entrances - $exits;

        $monthEntrances = FinancialRecord::where('type', 'revenue')
            ->where('status', 'approved')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        $monthExits = FinancialRecord::where('type', 'expense')
            ->where('status', 'approved')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        $transactions = FinancialRecord::orderBy('created_at', 'desc')->take(10)->get();

        return view('pages.finance.dashboard', compact('balance', 'monthEntrances', 'monthExits', 'transactions'));
    }

    public function transparency()
    {
        $records = FinancialRecord::orderBy('created_at', 'desc')->paginate(20);
        return view('pages.finance.transparency', compact('records'));
    }

    public function donors()
    {
        $donations = \App\Models\Donation::with('user')->latest()->paginate(20);
        $totalDonations = \App\Models\Donation::where('status', 'confirmed')->sum('amount');
        return view('pages.finance.donors', compact('donations', 'totalDonations'));
    }

    public function reconciliation()
    {
        $pendingRecords = FinancialRecord::where('status', 'pending')->get();
        return view('pages.finance.reconciliation', compact('pendingRecords'));
    }

    public function modelosOficios()
    {
        return view('pages.shared.modelos-oficios');
    }

    public function fichaFiliacao()
    {
        return view('pages.shared.ficha-filiacao');
    }
}
