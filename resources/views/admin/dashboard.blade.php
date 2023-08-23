@extends('layouts.app')
@section('title', 'Dashboard | ')

@section('content')

<div class="row">
    <div class="col-md-3">
        @include('admin.sidebar')
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <div class="card border border-success">
                    <div class="card-body">
                        <small>Customers</small>
                        <h3>{{ $data['customers'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border border-info">
                    <div class="card-body">
                        <small>Products</small>
                        <h3>{{ $data['products'] }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border border-primary">
                    <div class="card-body">
                        <small>Orders</small>
                        <h3>{{ $data['orders'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection