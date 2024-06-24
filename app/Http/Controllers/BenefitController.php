<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;
use App\Http\Requests\BenefitRequest;
use Illuminate\Validation\ValidationException;

class BenefitController extends Controller
{
    public function index()
    {
        return view("dashboard.benefit.list");
    }

    public function done()
    {
        return view("dashboard.benefit.done");
    }

    public function create()
    {
        //  
    }

    public function store(BenefitRequest $request)
    {
        $data = $request->validated();

        $employeeBenefit = \App\Models\Employee::where('nik', $request->employeeNIK)->value($request->type);

        $data['amount'] = str_replace(['.', ','], '', $data['amount']);

        if ($data['amount'] > $employeeBenefit) {
            throw ValidationException::withMessages([
                'amount' => 'The benefit amount exceeds the allowed limit.',
            ]);
        }

        if ($request->file('file')) {
            $data['file'] = $request->file('file')->store('bukti');
        }

        Benefit::create($data);

        return to_route('request')->with('success', 'Berhasil mengirim permintaan tunjangan');
    }

    public function show(string $id)
    {
        return view('dashboard.benefit.detail');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
