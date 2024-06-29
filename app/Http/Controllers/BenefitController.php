<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Benefit;
use Illuminate\Http\Request;
use App\Http\Requests\BenefitRequest;
use Illuminate\Validation\ValidationException;

class BenefitController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status ?? 'menunggu';

        $benefits = Benefit::with("employee.user:id,name")
            ->when($status === "menunggu", function ($query) {
                return $query->whereStatus(Benefit::MENUNGGU);
            })
            ->when($status === "proses", function ($query) {
                return $query->whereStatus(Benefit::PROSES);
            })
            ->when($status === "ditolak", function ($query) {
                return $query->whereStatus(Benefit::TOLAK);
            })
            ->when($request->has('nama') && !empty($request->nama), function ($query) use ($request) {
                return $query->whereUserName($request->nama);
            })
            ->when($request->has('tanggal') && !empty($request->tanggal), function ($query) use ($request) {
                $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
                return $query->whereDate('created_at', $tanggal);
            })
            ->when($request->has('jenis') && !empty($request->jenis), function ($query) use ($request) {
                return $query->whereType($request->jenis);
            })
            ->paginate(1);

        return view("dashboard.benefit.list", compact('benefits'));
    }

    public function done(Request $request)
    {
        $benefits = Benefit::with("employee.user:id,name")
            ->whereStatus(Benefit::SELESAI)
            ->when($request->has('nama') && !empty($request->nama), function ($query) use ($request) {
                return $query->whereUserName($request->nama);
            })
            ->when($request->has('tanggal') && !empty($request->tanggal), function ($query) use ($request) {
                $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
                return $query->whereDate('created_at', $tanggal);
            })
            ->when($request->has('jenis') && !empty($request->jenis), function ($query) use ($request) {
                return $query->whereType($request->jenis);
            })
            ->paginate(1);

        return view("dashboard.benefit.done", compact('benefits'));
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
