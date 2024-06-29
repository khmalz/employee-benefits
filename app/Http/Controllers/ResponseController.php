<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponseRequest;
use App\Models\Benefit;
use App\Models\Response;

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

            $benefit->employee()->update([
                $benefitType => $currentAmount - $benefitAmount,
            ]);
        }

        if ($request->status == 'tolak') {
            return to_route('benefit.index')->with('reject', 'Penolakan Permintaan Berhasil');
        }

        return to_route('benefit.index')->with('success', 'Berhasil Mengirim Tanggapan');
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
