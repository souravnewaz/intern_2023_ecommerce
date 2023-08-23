@extends('layouts.app')
@section('title', 'Orders | ')

@section('content')

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col">Items</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->created_at->format('Y-m-d h:ia') }}</td>
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
                <td>{{ $order->status }}</td>
            </tr>
            
        @endforeach
    </tbody>
</table>


@endsection