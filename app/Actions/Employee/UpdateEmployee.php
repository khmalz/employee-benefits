<?php

namespace App\Actions\Employee;

use App\Models\Employee;
use App\DTO\EmployeeData;
use Illuminate\Support\Facades\DB;

class UpdateEmployee
{
    public function handle(Employee $employee, EmployeeData $dataEmployee)
    {
        DB::transaction(function () use ($employee, $dataEmployee) {
            $employee->user()->update([
                'name' => $dataEmployee->name,
                'email' => $dataEmployee->email,
            ]);

            $employee->update($dataEmployee->toArray());
        });
    }
}
