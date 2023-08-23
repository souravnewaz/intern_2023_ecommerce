@extends('layouts.auth')
@section('title', 'Registration | ')
@section('content')

<form style="width:480px" class="p-5 bg-white border shadow-sm rounded" method="post">
    @CSRF
    <center>
        <img class="mb-1" src="{{ asset('assets/images/icons/cart.png') }}" alt="icon">
        <h1 class="h3 mb-3 fw-normal">Sign up</h1>
    </center>
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First name</label>
                <input type="email" class="form-control" name="first_name" required>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last name</label>
                <input type="email" class="form-control" name="last_name" required>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" required>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Sign up</button>
    <p>Already registered here? <a href="/login">Login</a></p> 

    @include('flash-msg')
</form>

@endsection