@extends('layouts.app')
@section('title', 'Dashboard | ')

@section('content')

<div class="row">
    <div class="col-md-3">
        @include('admin.sidebar')
    </div>
    <div class="col-md-9">
        <div class="d-flex justify-content-between bg-light p-2 mb-2 border">
            <div>
                <h4>Orders</h4>
            </div>
            <div>
                <form>
                    <select name="sort" class="form-select" onchange="this.form.submit()">
                        <option selected disabled>Sort</option>
                        <option value="asc" {{ request()->sort == 'asc' ? 'selected' : ''}}>Latest</option>
                        <option value="desc" {{ request()->sort == 'desc' ? 'selected' : ''}}>Old</option>
                    </select>
                </form>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Date</th>
                    <th scope="col">Items</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td scope="row">{{ $order->id }}</td>
                        <td class="small">
                            <h6>Customer Details:</h6>
                            <p class="m-0">&bull; {{ $order->user->first_name }}</p>
                            <p class="m-0">&bull; {{ $order->user->email }}</p>
                            <p class="m-0">&bull; {{ $order->user->phone }}</p>
                        </td>
                        <td class="small">{{ $order->created_at->format('Y-m-d') }}</td>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                                <tbody>                            
                                    @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </td>
                        <td><strong>{{ $order->subtotal }}</strong></td>
                        <td>
                            <form action="{{ route('admin.updateStatus') }}" method="POST">
                                @CSRF
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : ''}}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : ''}}>Processing</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : ''}}>Delivered</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection