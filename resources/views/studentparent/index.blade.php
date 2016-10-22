@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Parents
                        <span class="pull-right"><a href="{{ route('parents.create') }}">New</a></span>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <td>ID #</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Actions</td>
                            </thead>
                            <tbody>
                        @foreach($studentParents as $parent)
                            <td>{{ $parent->id }}</td>
                            <td>{{ $parent->name }}</td>
                            <td>{{ $parent->email }}</td>
                            <td><a href="{{ route('parents.edit', $parent) }}">edit</a></td>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
