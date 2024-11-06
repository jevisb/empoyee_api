<?php

namespace App\Http\Controllers;

use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }


    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }
//destroyfunction
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
    // In app/Http/Controllers/EmployeeController.php
public function update(Request $request, $id)
{
    // Find the employee by ID
    $employee = Employee::findOrFail($id);

    // Update the employee's details
    $employee->update([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'basic_pay' => $request->input('basic_pay'),
        'housing_allowance' => $request->input('housing_allowance'),
        'transport_allowance' => $request->input('transport_allowance'),
    ]);

    // Optionally, return a response (e.g., success message or updated employee)
    return response()->json(['message' => 'Employee updated successfully!', 'employee' => $employee]);
}

}

