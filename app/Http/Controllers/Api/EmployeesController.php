<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    public function index()
    {
        //get all employees
        $employees = Employee::all();
        return response()->json($employees);

    }
    public function store(Request $request)
    {
        //validate the request using the variable $ validateor
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'employee_number' => 'required|integer|unique:employees',
            'phone' => 'required|string|max:255',
            'basic_pay' => 'required|numeric|min:0',
            'housing_allowance' => 'nullable|numeric|min:0',
            'transport_allowance' => 'nullable|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        //calculate grosspay,tax and netpay
        $grossPay = $request->basic_pay + $request->housing_allowance + $request->transport_allowance;
        $tax = $grossPay * 0.20;
        $netPay = $grossPay - $tax;
        $employee = Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'employee_number' => $request->employee_number,
            'phone' => $request->phone,
            'basic_pay' => $request->basic_pay,
            'housing_allowance' => $request->housing_allowance,
            'transport_allowance' => $request->transport_allowance,
            'gross_pay' => $grossPay,
            'tax' => $tax,
            'net_pay' => $netPay,
        ]);

        return response()->json(['message' => 'Employee created successfully', 'employee' => $employee], 201);
    }

    public function show($id)
    {
        //displayemployee
        $employee = Employee::find($id);
        if ($employee) {
            return response()->json($employee);
        }
        return response()->json(['message' => 'Employee not found'], 404);
    }
    public function update(Request $request,$id)
    {
        //update record
        $employee = Employee::find($id);
        if ($employee) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'nullable|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'employee_number' => 'nullable|integer|unique:employees,employee_number,' . $employee->id,
                'phone' => 'nullable|string|max:15',
                'email' => 'nullable|email|unique:employees,email,' . $employee->id,
                'basic_pay' => 'nullable|numeric|min:0',
                'housing_allowance' => 'nullable|numeric|min:0',
                'transport_allowance' => 'nullable|numeric|min:0',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }
            // Update fields
            $employee->update($request->only(['first_name', 'last_name', 'phone', 'email', 'basic_pay', 'housing_allowance', 'transport_allowance']));

            // Recalculate gross pay, tax, and net pay
            $grossPay = $employee->basic_pay + $employee->housing_allowance + $employee->transport_allowance;
            $tax = $grossPay * 0.20;
            $netPay = $grossPay - $tax;

            // Update the employee with new calculated values
            $employee->update([
                'gross_pay' => $grossPay,
                'tax' => $tax,
                'net_pay' => $netPay,
            ]);

            return response()->json(['message' => 'Employee updated successfully', 'employee' => $employee]);
        } else {
            return response()->json(['message' => 'Employee not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            $employee->delete();
            return response()->json(['message' => 'Employee deleted successfully']);
        }

        return response()->json(['message' => 'Employee not found'], 404);
    }
}
