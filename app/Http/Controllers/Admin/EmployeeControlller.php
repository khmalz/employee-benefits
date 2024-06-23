<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;

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
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);
        $user->employee()->create($data);

        return to_route('employee.index')->with('success', 'Berhasil tambah data karyawan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        // 
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
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();

        $employee->user()->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $employee->update($data);

        return to_route('employee.index')->with('success', 'Berhasil edit data karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->user()->delete();
        return to_route('employee.index')->with('deleted', 'Berhasil hapus data karyawan');
    }
}
