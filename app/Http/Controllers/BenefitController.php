<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BenefitRequest;
use Illuminate\Validation\ValidationException;

class BenefitController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status ?? 'menunggu';

        $benefits = Benefit::with("employee.user:id,name")
            ->status($status)
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
            ->oldest()
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
            ->oldest()
            ->paginate(10);

        return view("dashboard.benefit.done", compact('benefits'));
    }

    public function store(BenefitRequest $request)
    {
        $data = $request->validated();

        $employeeBenefit = \App\Models\Employee::where('nik', $request->employeeNIK)->value($request->type);

        $data['amount'] = str_replace(['.', ','], '', $data['amount']);

        if ($data['amount'] > $employeeBenefit) {
            throw ValidationException::withMessages([
                'amount' => 'Jumlah tunjangan melebihi batas yang diizinkan.',
            ]);
        }

        if ($request->file('file')) {
            $data['file'] = $request->file('file')->store('bukti');
        }

        Benefit::create($data);

        return to_route('request')->with('success', 'Berhasil mengirim permintaan tunjangan');
    }

    public function show(Benefit $benefit)
    {
        $benefit->load(['employee.user', 'response']);

        $isBenefitExceededLimit = $benefit->amount > $benefit->employee->{$benefit->type};

        return view('dashboard.benefit.detail', compact('benefit', 'isBenefitExceededLimit'));
    }

    public function update(BenefitRequest $request, Benefit $benefit)
    {
        $data = $request->validated();
        $amountException = false;

        DB::beginTransaction();

        try {
            $employeeBenefit = \App\Models\Employee::where('nik', $request->employeeNIK)->value($request->type);

            $data['amount'] = str_replace(['.', ','], '', $data['amount']);

            if ($data['amount'] > $employeeBenefit) {
                $amountException = true;
                throw new \Exception('Fake error to trigger catch block');
            }

            if ($request->hasFile('file')) {
                File::delete(public_path("images/$benefit->file"));

                $data['file'] = $request->file('file')->store('bukti');
            }

            $data['status'] = 'pending';

            $benefit->update($data);

            $benefit->response()->delete();

            DB::commit();

            return to_route('request')->with('success', 'Berhasil mengedit permintaan tunjangan');
        } catch (\Exception $e) {
            DB::rollback();

            if ($amountException) {
                throw ValidationException::withMessages([
                    'amount' => 'Jumlah tunjangan melebihi batas yang diizinkan.',
                ]);
            }

            return back()->with('error', 'Failed to save changes: ' . $e->getMessage());
        }
    }

    public function destroy(Benefit $benefit)
    {
        File::delete(public_path("images/$benefit->file"));
        $benefit->delete();

        return to_route("request")->with("success", "Berhasil menghapus permintaan tunjangan");
    }
}
