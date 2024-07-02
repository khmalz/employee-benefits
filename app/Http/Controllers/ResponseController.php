<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ResponseRequest;

class ResponseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(ResponseRequest $request, Benefit $benefit)
    {
        $request->validated();

        $amountException = false;

        DB::beginTransaction();

        try {
            Response::updateOrCreate(
                ['benefit_id' => $benefit->id],
                ['message' => $request->message]
            );

            $benefit->update([
                'status' => $request->status,
            ]);

            if ($request->status == Benefit::SELESAI) {
                $benefitType = $benefit->type;
                $benefitAmount = $benefit->amount;
                $currentAmount = $benefit->employee()->value($benefitType);

                if ($benefitAmount > $currentAmount) {
                    $amountException = true;
                    throw new \Exception('Fake error to trigger catch block');
                }

                $benefit->employee()->update([
                    $benefitType => $currentAmount - $benefitAmount,
                ]);
            }

            DB::commit();

            if ($request->status == 'tolak') {
                return to_route('benefit.index')->with('reject', 'Penolakan Permintaan Berhasil');
            }

            return to_route('benefit.index')->with('success', 'Berhasil Mengirim Tanggapan');
        } catch (\Exception $e) {
            DB::rollback();

            if ($amountException) {
                return back()->with('error', 'Jumlah tunjangan melebihi batas yang diizinkan.');
            }

            return back()->with('error', 'Failed to save changes: ' . $e->getMessage());
        }
    }
}
