<!-- resources/views/employees/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Employee List</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add New Employee</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Basic Pay</th>
                <th>Gross Pay</th>
                <th>Net Pay</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->basic_pay }}</td>
                <td>{{ $employee->gross_pay }}</td>
                <td>{{ $employee->net_pay }}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
