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
        return view('pages.finance.transparency');
    }

    public function donors()
    {
        return view('pages.finance.donors');
    }

    public function reconciliation()
    {
        return view('pages.finance.reconciliation');
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
