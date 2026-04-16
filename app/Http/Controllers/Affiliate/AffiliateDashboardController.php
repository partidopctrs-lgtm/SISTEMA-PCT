<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AffiliateDashboardController extends Controller
{
    public function index()
    {
        return view('pages.affiliate.dashboard');
    }

    public function profile()
    {
        return view('pages.affiliate.profile');
    }

    public function carteirinha()
    {
        return view('pages.affiliate.carteirinha');
    }

    public function escola()
    {
        return view('pages.affiliate.escola');
    }

    public function missoes()
    {
        return view('pages.affiliate.missoes');
    }

    public function convites()
    {
        return view('pages.affiliate.convites');
    }

    public function comunidade()
    {
        return view('pages.affiliate.comunidade');
    }

    public function documentos()
    {
        return view('pages.affiliate.documentos');
    }

    public function membershipForm()
    {
        return view('pages.affiliate.membership-form');
    }

    public function eventos()
    {
        return view('pages.affiliate.eventos');
    }

    public function financeiro()
    {
        return view('pages.affiliate.financeiro');
    }

    public function suporte()
    {
        return view('pages.affiliate.suporte');
    }

    public function configuracoes()
    {
        return view('pages.affiliate.configuracoes');
    }
}
