<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        return view('pages.finance.dashboard');
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
