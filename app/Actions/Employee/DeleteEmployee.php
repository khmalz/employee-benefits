<?php

namespace App\Actions\Employee;

use App\Models\Employee;

class DeleteEmployee
{
    public function handle(Employee $employee)
    {
        $employee->user()->delete();
    }
}
