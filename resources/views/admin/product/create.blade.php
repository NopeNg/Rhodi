<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="w-[220px] shadow-lg flex flex-col">
            <h1 class="text-xl font-bold p-4">Admin Panel</h1>
            <ul class="menu px-4">
                <!-- Sidebar links -->
                <li><a href="/2">🏠 Dashboard</a></li>
                <li><a href="admin-product">💎 Manage Products</a></li>
                <li><a href="admin-product-approve">➕ Add Product</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <div class="p-4 shadow flex items-center">
                <h2 class="text-xl font-bold">Add New Product</h2>
            </div>
            <main class="p-6">
                <!-- Error Handling -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
                    </div>

                    <!-- Category Dropdown -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            <option value="" disabled selected>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}">
                                    {{ $category->category_name }} - {{ $category->category_detail_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Brand Dropdown -->
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Brand</label>
                        <select name="brand_id" class="form-select" required>
                            <option value="" disabled selected>Select a brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Product Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <!-- Product Image -->
                    <div class="mb-3">
                        <label for="main_image" class="form-label">Main Image</label>
                        <input type="file" name="main_image" class="form-control" accept="image/*">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add Product</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </main>
        </div>
    </div>
</body>
</html>
