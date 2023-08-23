@extends('layouts.app')
@section('title', 'Customers | ')

@section('content')

<div class="row">
    <div class="col-md-3">
        @include('admin.sidebar')
    </div>
    <div class="col-md-9">
        <div class="d-flex justify-content-between bg-light p-2 mb-2 border">
            <div>
                <h4>Customers</h4>
            </div>
            
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection