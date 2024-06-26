<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;

class HistoryBenefitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $employeeUserID  = (int) $request->user()->employee->id;

        $pendingBenefits = Benefit::with("employee")
            ->whereStatus(Benefit::MENUNGGU)
            ->whereEmployeeID($employeeUserID)
            ->paginate(1);
        $progressBenefits = Benefit::with("employee")
            ->whereStatus(Benefit::PROSES)
            ->whereEmployeeID($employeeUserID)
            ->paginate(1);
        $doneBenefits = Benefit::with("employee")
            ->whereStatus(Benefit::SELESAI)
            ->whereEmployeeID($employeeUserID)
            ->paginate(1);
        $rejectedBenefits = Benefit::with("employee")
            ->whereStatus(Benefit::TOLAK)
            ->whereEmployeeID($employeeUserID)
            ->paginate(1);

        return view('dashboard.employee.history-benefit', compact('pendingBenefits', 'progressBenefits', 'doneBenefits', 'rejectedBenefits'));
    }
}
