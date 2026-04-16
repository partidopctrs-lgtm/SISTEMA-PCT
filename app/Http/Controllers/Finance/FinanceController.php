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

    public function modelosOficios()
    {
        return view('pages.shared.modelos-oficios');
    }

    public function fichaFiliacao()
    {
        return view('pages.shared.ficha-filiacao');
    }
}
