@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <!-- Title with Icon -->
                <div class="d-flex align-items-center">
                    <i class="bi bi-bar-chart-fill text-success me-2"></i>
                    <h5 class="m-0 fw-bold">Employee List</h5>
                </div>

                <!-- Add Employee Button -->
                <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-person-plus me-1"></i> Add Employee
                </a>
            </div>

            <div class="card-body">
                <!-- Filter and Show Entries Controls -->
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                        <label class="me-2">Show</label>
                        <select class="form-select form-select-sm" style="width: auto;">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="ms-2">entries</span>
                    </div>
                    <div>
                        <input type="search" class="form-control form-control-sm" placeholder="Search" aria-controls="example">
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Employee Number</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Basic Pay</th>
                                <th>Transport Allowance</th>
                                <th>Housing Allowance</th>
                                <th>Net Pay</th>
                                <th>Gross Pay</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + ($employees->currentPage() - 1) * $employees->perPage() }}</th>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->employee_number }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ number_format($employee->basic_pay, 2) }}</td>
                                    <td>{{ number_format($employee->transport_allowance, 2) }}</td>
                                    <td>{{ number_format($employee->housing_allowance, 2) }}</td>
                                    <td>{{ number_format($employee->net_pay, 2) }}</td>
                                    <td>{{ number_format($employee->gross_pay, 2) }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <!-- Edit Button with Icon -->
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <!-- Delete Button with Icon -->
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination and Info -->
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <p class="m-0">Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }} of {{ $employees->total() }} entries</p>
                    </div>
                    <div>
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
