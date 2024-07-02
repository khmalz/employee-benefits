<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Benefit;
use Illuminate\Http\Request;

class HistoryBenefitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $status = $request->status ?? 'menunggu';
        $employeeUserID  = (int) $request->user()->employee->id;

        $benefits = Benefit::with("employee.user:id,name")
            ->whereEmployeeID($employeeUserID)
            ->when($status === "menunggu", function ($query) {
                return $query->whereStatus(Benefit::MENUNGGU);
            })
            ->when($status === "proses", function ($query) {
                return $query->whereStatus(Benefit::PROSES);
            })
            ->when($status === "selesai", function ($query) {
                return $query->whereStatus(Benefit::SELESAI);
            })
            ->when($status === "ditolak", function ($query) {
                return $query->whereStatus(Benefit::TOLAK);
            })
            ->when($request->has('tanggal') && !empty($request->tanggal), function ($query) use ($request) {
                $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
                return $query->whereDate('created_at', $tanggal);
            })
            ->when($request->has('jenis') && !empty($request->jenis), function ($query) use ($request) {
                return $query->whereType($request->jenis);
            })
            ->oldest()
            ->paginate(1);

        return view('dashboard.employee.history-benefit', compact('benefits'));
    }
}
