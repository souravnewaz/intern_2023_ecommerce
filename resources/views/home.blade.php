@extends('layouts.app')
@section('content')

<h3>Featured Categories</h3>
<div style="overflow-y: scroll;" class="mb-3">
    <div class="d-flex my-2">
        @foreach ($categories as $category)
        <div>
            <a href="/?category={{$category->id}}" class="btn {{ request()->category == $category->id ? 'btn-dark' : 'btn-outline-dark' }} m-1 btn-sm text-nowrap">{{ $category->name }}</a>
        </div>
        @endforeach
    </div>
</div>

<h3>Products</h3>
<form action="/">
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="product" placeholder="Search Product" value="{{ request()->product }}">
        <button class="btn btn-outline-dark" type="submit">Search</button>
    </div>
</form>

@if(request()->product && !count($products))
<div class="alert alert-warning" role="alert">No results found for: <strong>{{ request()->product }}</strong></div>
@endif
<div class="row">
    @foreach ($products as $product)
    <div class="col-12 col-md-4 mb-4">
        <div class="card shadow">
            <img src="{{ asset($product->image) }}" alt="black watch">
            <div class="card-footer border-top border-gray-300 p-4">
                <a href="#" class="h5 d-block mb-0">{{ $product->name }}</a>
                <a class="badge bg-primary" href="/?category={{$product->category_id}}">{{ $product->category->name }}</a>
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
                    @if($product->regular_price != null)
                    <span>
                        <span class="small text-muted"><s>${{ $product->regular_price }}</s></span>
                        <span class="h5 mb-0 text-dark">${{ $product->price }}</span>
                    </span>
                    @else
                    <span class="h5 mb-0 text-gray">${{ $product->price }}</span>
                    @endif
                    <a class="btn btn-xs btn-light border" href="{{ route('carts.store', $product->id) }}">
                        <span class="fas fa-cart-plus me-2"></span> Add to cart
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection