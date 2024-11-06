<!-- resources/views/employees/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Add New Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Employee Number</label>
            <input type="text" name="employee_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Basic Pay</label>
            <input type="number" name="basic_pay" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Housing Allowance</label>
            <input type="number" name="housing_allowance" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Transport Allowance</label>
            <input type="number" name="transport_allowance" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Employee</button>
    </form>
</div>
@endsection
