<!-- resources/views/employees/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
        </div>
        <div class="form-group">
            <label>Basic Pay</label>
            <input type="number" name="basic_pay" class="form-control" value="{{ $employee->basic_pay }}" required>
        </div>
        <div class="form-group">
            <label>Housing Allowance</label>
            <input type="number" name="housing_allowance" class="form-control" value="{{ $employee->housing_allowance }}" required>
        </div>
        <div class="form-group">
            <label>Transport Allowance</label>
            <input type="number" name="transport_allowance" class="form-control" value="{{ $employee->transport_allowance }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>
@endsection
