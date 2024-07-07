<?php

namespace App\Actions\Benefit;

use App\Models\Benefit;
use App\DTO\BenefitData;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CreateBenefit
{
    public function handle(BenefitData $benefitData): void
    {
        DB::beginTransaction();

        try {
            $employeeBenefit = Employee::where('nik', $benefitData->employee_nik)->value($benefitData->type);

            if ($benefitData->amount > $employeeBenefit) {
                throw ValidationException::withMessages([
                    'amount' => 'Jumlah tunjangan melebihi batas yang diizinkan.',
                ]);
            }

            $data = $benefitData->toArray();

            if ($benefitData->file) {
                $data['file'] = $benefitData->file->store('bukti');
            }

            Benefit::create($data);

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();

            throw $e;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception('Terjadi kesalahan saat membuat benefit.');
        }
    }
}
