@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chỉnh Sửa Chi Tiết Sản Phẩm</h1>

    <form action="{{ route('product.details.update', $productDetail->product_detail_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Sử dụng PUT cho cập nhật -->

        <div class="mb-4">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" id="name" value="{{ old('name', $productDetail->name) }}" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $productDetail->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="size" class="form-label">Kích thước</label>
            <input type="text" name="size" id="size" value="{{ old('size', $productDetail->size) }}" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="brand" class="form-label">Thương hiệu</label>
            <input type="text" name="brand" id="brand" value="{{ old('brand', $productDetail->brand) }}" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="color" class="form-label">Màu sắc</label>
            <input type="text" name="color" id="color" value="{{ old('color', $productDetail->color) }}" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="cost" class="form-label">Giá</label>
            <input type="number" name="cost" id="cost" value="{{ old('cost', $productDetail->cost) }}" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="stock_quantity" class="form-label">Số lượng tồn kho</label>
            <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $productDetail->stock_quantity) }}" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="images" class="form-label">Hình ảnh</label>
            <input type="file" name="images[]" id="images" multiple class="form-control">
            <small class="form-text text-muted">Nếu bạn không muốn thay đổi hình ảnh, hãy để trống.</small>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection