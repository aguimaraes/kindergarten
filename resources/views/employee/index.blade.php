@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Employees
                        <span class="pull-right"><a href="{{ route('employees.create') }}">New</a></span>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                            <td>ID #</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($employees as $employee)
                            <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td><a href="{{ route('employees.edit', $employee) }}">edit</a></td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
