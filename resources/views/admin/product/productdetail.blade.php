@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Product Detail</h1>
    <form action="{{ route('product-details.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Product ID</label>
            <input type="number" name="product_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="product_code">Product Code</label>
            <input type="text" name="product_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control">
        </div>
        <div class="form-group">
            <label for="stock_quantity">Stock Quantity</label>
            <input type="number" name="stock_quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cost">Cost</label>
            <input type="number" name="cost" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="selling_price">Selling Price</label>
            <input type="number" name="selling_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Product Detail</button>
    </form>
</div>
@endsection