<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardSummaryController extends Controller
{

    public function index(): View{
        return view('dashboard-summary');
    }
}
