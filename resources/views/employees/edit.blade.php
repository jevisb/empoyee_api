<!-- resources/views/employees/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="main-card mb-3 card shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Edit Employee</h5>

                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $employee->first_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $employee->last_name }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $employee->phone }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basic_pay" class="form-label">Basic Pay</label>
                                <input type="number" name="basic_pay" id="basic_pay" class="form-control" value="{{ $employee->basic_pay }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="housing_allowance" class="form-label">Housing Allowance</label>
                                <input type="number" name="housing_allowance" id="housing_allowance" class="form-control" value="{{ $employee->housing_allowance }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="transport_allowance" class="form-label">Transport Allowance</label>
                                <input type="number" name="transport_allowance" id="transport_allowance" class="form-control" value="{{ $employee->transport_allowance }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary px-4">Update Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
