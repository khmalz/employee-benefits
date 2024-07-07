<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;

class RequestBenefitController extends Controller
{
    public function create()
    {
        return view('dashboard.employee.request-benefit');
    }

    public function edit(Request $request, Benefit $benefit)
    {
        abort_if(
            !($benefit->employee->user_id === auth()->user()->id && in_array($benefit->status, [Benefit::TOLAK, Benefit::MENUNGGU])),
            403
        );

        return view('dashboard.employee.edit-request-benefit', compact('benefit'));
    }
}
