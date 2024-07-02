<?php

namespace App\Http\Controllers;

use ErrorException;
use App\Models\Benefit;
use App\Models\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ResponseRequest;
use Illuminate\Validation\ValidationException;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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
                return back()->with('error', 'The benefit amount exceeds the allowed limit.');
            }

            return back()->with('error', 'Failed to save changes: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResponseRequest $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        //
    }
}
