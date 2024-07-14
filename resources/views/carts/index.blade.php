@extends('layouts.app')
@section('title', 'Cart | ')

@section('content')

<?php
    $subtotal = 0;
?>
@if(count($carts) > 0)
<div class="container px-3 clearfix">
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <th class="text-center py-3 px-4" style="min-width: 300px;">Product Name &amp; Details</th>
                            <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                            <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                            <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                            <th class="text-right py-3 px-4" style="width: 100px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr>
                                <td class="p-4">
                                    <div class="media align-items-center">
                                        <img src="{{ asset($cart->product->image) }}" alt="product-img" height="64" width="64">
                                        <div class="media-body">
                                            <a href="#" class="d-block text-dark">{{ $cart->product->name }}</a>
                                            <small>
                                                <span class="text-muted">Category: </span> {{ $cart->product->category->name }} &nbsp;
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right font-weight-semibold align-middle p-4">${{ $cart->product->price }}</td>
                                <td class="align-middle p-4">{{ $cart->quantity }}</td>
                                
                                <?php
                                    $total = ($cart->product->price * $cart->quantity);
                                    $subtotal += $total;
                                ?>

                                <td class="text-right font-weight-semibold align-middle p-4">$ {{ $total }}</td>
                                <td class="text-center align-middle px-0">
                                    <a href="{{ route('carts.delete', $cart->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <form action="{{ route('checkout') }}" method="POST">
                                @CSRF
                                <td>
                                    <input type="text" name="address" class="form-control" placeholder="Your address here" required>
                                </td>
                                <td></td>
                                <td style="border-right: 0;">Total</td>
                                <td style="border-left: 0;"><strong>${{ $subtotal }}</strong></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Checkout</button>
                                </td>
                            </form>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@else

<div class="alert alert-secondary" role="alert">
    Your cart is empty!
</div>

@endif

@endsection