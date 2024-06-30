<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFBenefitController extends Controller
{
    public function done(Request $request)
    {
        $benefits = Benefit::whereStatus(Benefit::SELESAI)->oldest()->get();

        if ($benefits->isEmpty()) {
            return back()->with('kosong', 'Maaf, Tunjangan Yang Ingin di Eksport Tidak Ada');
        }

        $totalBenefit = $benefits->sum('amount');

        $pdf = Pdf::loadView('pdf.benefit-done', compact('benefits', 'totalBenefit'));
        return $pdf->stream('tunjangan_sudah.pdf');
    }
}
