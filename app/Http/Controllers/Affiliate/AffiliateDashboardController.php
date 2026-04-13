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
