@extends('layouts.app')

@section('content')

<div class="row">
    @foreach ($products as $product)
        <div class="col-12 col-md-4 mb-4">
            <div class="card shadow">
                <img src="{{ asset($product->image) }}" alt="black watch" > 
                <div class="card-footer border-top border-gray-300 p-4">
                    <a href="#" class="h5">{{ $product->name }}</a>
                    <h3 class="h6 fw-light text-gray mt-2">{{ $product->short_description }}</h3>
                    <div class="d-flex mt-3">
                        <span class="star fas fa-star text-warning me-1"></span> 
                        <span class="star fas fa-star text-warning me-1"></span> 
                        <span class="star fas fa-star text-warning me-1"></span> 
                        <span class="star fas fa-star text-warning me-1"></span> 
                        <span class="star fas fa-star text-warning"></span> 
                        <span class="badge bg-primary ms-2">4.7</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="h5 mb-0 text-gray">${{ $product->price }}</span> 
                        <a class="btn btn-xs btn-light" href="{{ route('carts.store', $product->id) }}">
                            <span class="fas fa-cart-plus me-2"></span> Add to cart
                        </a>
                    </div>
                </div>
            </div> 
        </div>
    @endforeach
</div>

@endsection