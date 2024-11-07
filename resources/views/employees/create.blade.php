<!-- resources/views/employees/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="main-card mb-3 card shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Add New Employee</h5>

                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employee_number" class="form-label">Employee Number</label>
                                <input type="text" name="employee_number" id="employee_number" placeholder="Employee Number" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basic_pay" class="form-label">Basic Pay</label>
                                <input type="number" name="basic_pay" id="basic_pay" placeholder="Basic Pay" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="housing_allowance" class="form-label">Housing Allowance</label>
                                <input type="number" name="housing_allowance" id="housing_allowance" placeholder="Housing Allowance" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="transport_allowance" class="form-label">Transport Allowance</label>
                                <input type="number" name="transport_allowance" id="transport_allowance" placeholder="Transport Allowance" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary px-4">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
