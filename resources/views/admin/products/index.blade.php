@extends('layouts.app')
@section('title', 'Products | ')

@section('content')

<div class="row">
    <div class="col-md-3">
        @include('admin.sidebar')
    </div>
    <div class="col-md-9">
        <div class="d-flex justify-content-between bg-light p-2 mb-2 border">
            <div>
                <h4>Products</h4>
            </div>
            <div>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">Add Product</a>
            </div>
        </div>
        <ul class="list-group">
            @foreach ($products as $product)
                <li class="list-group-item">
                    <div class="d-flex">
                        <div>
                            <img src="{{ asset($product->image) }}" alt="img" height="64" width="64" class="rounded">
                        </div>
                        <div class="mx-2">
                            <p class="m-0">{{ $product->name }} <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-dark btn-sm">edit</a></p>
                            <span class="badge rounded-pill bg-secondary">{{ $product->category->name }}</span>
                            <p class="m-0 fw-bold">${{ $product->price }}</p>
                            <p class="m-0 text-muted small">{{ $product->description }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection