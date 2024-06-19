<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryBenefitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.employee.history-benefit');
    }
}
