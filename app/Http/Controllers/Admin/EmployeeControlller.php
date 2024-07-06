<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\DTO\EmployeeData;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Actions\Employee\CreateEmployee;
use App\Actions\Employee\DeleteEmployee;
use App\Actions\Employee\UpdateEmployee;

class EmployeeControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('user')->get();

        return view('dashboard.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request, CreateEmployee $action)
    {
        $data = $request->validated();
        $employeeData = EmployeeData::fromArray($data);

        $action->handle($employeeData);

        return to_route('employee.index')->with('success', 'Berhasil tambah data karyawan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load('user');

        return view('dashboard.employee.detail', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $employee->load('user');

        return view('dashboard.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee, UpdateEmployee $action)
    {
        $data = $request->validated();
        $employeeData = EmployeeData::fromArray($data);

        $action->handle($employee, $employeeData);

        return to_route('employee.index')->with('success', 'Berhasil edit data karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee, DeleteEmployee $action)
    {
        $action->handle($employee);
        return to_route('employee.index')->with('success', 'Berhasil hapus data karyawan');
    }
}
