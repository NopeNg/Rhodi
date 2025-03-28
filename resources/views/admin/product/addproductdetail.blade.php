@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="en" data-theme="light">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add Product Detail</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="">

        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar -->
            <div id="sidebar" class="transition-all duration-300 w-[220px] overflow-hidden shadow-lg flex flex-col">
                <h1 class="text-xl font-bold p-4">Admin Panel</h1>
                <ul class="menu flex-grow space-y-2 px-4">
                    <li><a href="/2" class="flex items-center gap-2">🏠 Dashboard</a></li>
                    <li>
                        <details class="group">
                            <summary class="flex items-center gap-2 cursor-pointer">👨‍💼 Employees</summary>
                            <ul class="ml-4 space-y-1 hidden group-open:block">
                                <li><a href="admin-emp-all">Manage Employees</a></li>
                                <li><a href="admin-emp-add">Add Employee</a></li>
                                <li><a href="admin-emp-tracking">Employee Tracking</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details class="group">
                            <summary class="flex items-center gap-2 cursor-pointer">👨 Users</summary>
                            <ul class="ml-4 space-y-1 hidden group-open:block">
                                <li><a href="admin-customer-manage">Manage Users</a></li>
                                <li><a href="admin-customer-add">Add User</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details class="group">
                            <summary class="flex items-center gap-2 cursor-pointer">💎 Products</summary>
                            <ul class="ml-4 space-y-1 hidden group-open:block">
                                <li><a href="admin-product">Manage Products</a></li>
                                <li><a href="admin-product-approve">Add Product</a></li>
                            </ul>
                        </details>
                    </li>
                    <li><a class="flex items-center gap-2">📊 Reports</a></li>
                    <li>
                        <details class="group">
                            <summary tabindex="0" class="flex items-center gap-2 cursor-pointer"> 🎨 Theme </summary>
                            <ul tabindex="0" class="ml-4 space-y-1 hidden group-open:block">
                                <li><input type="radio" name="theme-dropdown"
                                        class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
                                        aria-label="Light" value="light" /></li>
                                <li><input type="radio" name="theme-dropdown"
                                        class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
                                        aria-label="Dark" value="dark" /></li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="flex-grow p-6">
                <h1 class="text-2xl font-bold mb-4">Thêm Chi Tiết Sản Phẩm cho: <span
                        id="product_name">{{ $product->name }}</span></h1>
                <form action="{{ route('product.details.store', $product->product_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="" name="product_id" value="{{ $product->product_id }}">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên Sản Phẩm</label>
                        <input type="text" name="name" id="name"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{ $product->name }}" required readonly>
                    </div>


                    <div class="mb-4">
                        <label for="brand" class="block text-sm font-medium text-gray-700">Thương Hiệu</label>
                        <input type="text" name="brand" id="brand"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{ $product->brand }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Mô Tả</label>
                        <textarea name="description" id="description"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="size" class="block text-sm font-medium text-gray-700">Kích Thước</label>
                        <input type="text" name="size" id="size"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="color" class="block text-sm font-medium text-gray-700">Màu Sắc</label>
                        <input type="text" name="color" id="color"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="cost" class="block text-sm font-medium text-gray-700">Giá Gốc</label>
                        <input type="number" name="cost" id="cost"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="stock_quantity" class="block text-sm font-medium text-gray-700">Số Lượng Tồn Kho</label>
                        <input type="number" name="stock_quantity" id="stock_quantity"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="images" class="block text-sm font-medium text-gray-700">Hình Ảnh</label>
                        <input type="file" name="images[]" id="images" multiple
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Thêm Chi Tiết</button>
                </form>
                <!-- Hiển thị thông báo lỗi -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Hiển thị thông báo thành công -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Thiết lập lắng nghe sự kiện cho các trường
                setupProductCodeGeneration('product_name', 'brand', 'size', 'color', 'product_code', 'stock_quantity');
            });

            function generateProductCode(productNameId, brandId, sizeId, colorId, outputId) {
                // Lấy giá trị từ thẻ <p> và các trường nhập liệu
                const productName = document.getElementById(productNameId).innerText; // Lấy giá trị từ thẻ <p>
                const brand = document.getElementById(brandId).value; // Lấy giá trị từ trường nhập
                const size = document.getElementById(sizeId).value; // Lấy giá trị từ trường nhập
                const color = document.getElementById(colorId).value; // Lấy giá trị từ trường nhập
                const output = document.getElementById(outputId); // Lấy thẻ <p> để hiển thị mã
                const stockQuantity = document.getElementById('stock_quantity').value;

                // Chuyển đổi tên sản phẩm thành không dấu, viết thường và không có khoảng trắng
                const slugify = (text) => {
                    return text
                        .toString()
                        .toLowerCase()
                        .replace(/\s+/g, '') // Xóa khoảng trắng
                        .replace(/[^\w\-]+/g, '') // Xóa ký tự không phải chữ cái, số hoặc dấu gạch ngang
                        .replace(/\-\-+/g, '-') // Thay thế nhiều dấu gạch ngang bằng một dấu gạch ngang
                        .replace(/^-+/, '') // Xóa dấu gạch ngang ở đầu
                        .replace(/-+$/, ''); // Xóa dấu gạch ngang ở cuối
                };

                // Tạo mã sản phẩm
                const productCode = slugify(productName) + slugify(brand) + slugify(size) + slugify(color);

                // Cập nhật giá trị vào trường mã sản phẩm
                document.getElementById(outputId).value = productCode;
            }

            // Hàm để thiết lập lắng nghe sự kiện cho các trường
            function setupProductCodeGeneration(productNameId, brandId, sizeId, colorId, outputId) {
                // Không cần lắng nghe sự kiện cho productName vì nó là thẻ <p>
                document.getElementById(brandId).addEventListener('input', () => generateProductCode(productNameId, brandId, sizeId, colorId, outputId));
                document.getElementById(sizeId).addEventListener('input', () => generateProductCode(productNameId, brandId, sizeId, colorId, outputId));
                document.getElementById(colorId).addEventListener('input', () => generateProductCode(productNameId, brandId, sizeId, colorId, outputId));
            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                setupProductCodeGeneration('product_name', 'brand', 'size', 'color', 'product_code');
            });
        </script>
    </body>

    </html>

@endsection