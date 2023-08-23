@extends('layouts.app')
@section('title', 'Dashboard | ')

@section('content')

<div class="row">
    <div class="col-md-3">
        @include('admin.sidebar')
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>Add Product</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.products') }}" class="btn btn-primary btn-sm">All Products</a> 
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="post">
                    @CSRF
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select">
                            <option selected disabled>select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection