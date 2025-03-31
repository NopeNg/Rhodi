@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 font-weight-bold">Chỉnh Sửa Chi Tiết Sản Phẩm</h1>

        <form action="{{ route('product.details.update', $productDetail->product_detail_id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Sử dụng PUT cho cập nhật -->

            <!-- Tên sản phẩm -->
            <div class="form-group mb-3">
                <label for="dname" class="form-label">Tên Sản Phẩm</label>
                <input type="text" name="dname" id="dname" value="{{ old('dname', $productDetail->dname) }}"
                    class="form-control">
                <small class="form-text text-muted">Tên sản phẩm sẽ giữ nguyên nếu bạn không nhập gì.</small>
            </div>


            <!-- Mô tả -->
            <div class="form-group mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <textarea name="description" id="description" rows="4"
                    class="form-control">{{ old('description', $productDetail->description) }}</textarea>
            </div>

            <!-- Kích thước -->
            <div class="form-group mb-3">
                <label for="size" class="form-label">Kích Thước</label>
                <input type="text" name="size" id="size" value="{{ old('size', $productDetail->size) }}"
                    class="form-control">
            </div>

            <!-- Thương hiệu -->
            <div class="form-group mb-3">
                <label for="brand" class="form-label">Thương Hiệu</label>
                <input type="text" name="brand" id="brand" value="{{ old('brand', $productDetail->brand) }}"
                    class="form-control">
            </div>

            <!-- Màu sắc -->
            <div class="form-group mb-3">
                <label for="color" class="form-label">Màu Sắc</label>
                <input type="text" name="color" id="color" value="{{ old('color', $productDetail->color) }}"
                    class="form-control">
            </div>

            <!-- Giá -->
            <div class="form-group mb-3">
                <label for="cost" class="form-label">Giá</label>
                <input type="number" name="cost" id="cost" value="{{ old('cost', $productDetail->cost) }}"
                    class="form-control">
            </div>

            <!-- Số lượng tồn kho -->
            <div class="form-group mb-3">
                <label for="stock_quantity" class="form-label">Số Lượng Tồn Kho</label>
                <input type="number" name="stock_quantity" id="stock_quantity"
                    value="{{ old('stock_quantity', $productDetail->stock_quantity) }}" class="form-control">
            </div>

            <!-- Hình ảnh -->
            <div class="form-group mb-3">
                <label for="images" class="form-label">Hình Ảnh</label>
                <input type="file" name="images[]" id="images" multiple class="form-control">
                <small class="form-text text-muted">Nếu không muốn thay đổi hình ảnh, hãy để trống.</small>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>
@endsection