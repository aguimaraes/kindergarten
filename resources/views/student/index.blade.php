@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Students
                        <span class="pull-right"><a href="{{ route('students.create') }}">New</a></span>
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
                        @foreach($students as $student)
                            <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td><a href="{{ route('students.edit', $student) }}">edit</a></td>
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
