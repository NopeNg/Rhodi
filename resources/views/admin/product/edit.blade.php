@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Product</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
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
              <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Light" value="light" /></li>
              <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Dark" value="dark" /></li>
              <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Cyberpunk" value="cyberpunk" /></li>
              <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Valentine" value="valentine" /></li>
              <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Aqua" value="aqua" /></li>
            </ul>
          </details>
        </li>
      </ul>

      <!-- Profile dropdown -->
      <div class="relative mt-auto p-4">
        <button id="profile-btn" class="flex items-center p-2 rounded-lg w-full hover:bg-neutral-300">
          <span class="text-sm font-medium flex-grow text-center">👤 heallll</span>
        </button>
        <div id="profile-menu" class="absolute bottom-16 left-4 w-48 rounded-md hidden shadow-lg z-20">
          <div class="p-3 border-b flex items-center gap-2">
            <span class="font-medium">haell</span>
          </div>
          <a href="profile" class="block px-4 py-2 hover:bg-gray-200">👤 Profile</a>
          <a href="logout" class="block px-4 py-2 text-red-500 hover:bg-gray-100">🚪 Logout</a>
        </div>
      </ div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col overflow-auto">
      <!-- Topbar -->
      <div class="p-4 shadow flex items-center">
        <button id="toggleSidebar" class="px-4 py-2 rounded-md mr-4">☰</button>
        <h2 class="text-xl font-bold">Edit Product</h2>
      </div>

      <!-- Page Content -->
      <main class="p-6 flex-1 overflow-y-auto">
        <form action="{{ route('products.update', $product->product_id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="product_code" class="form-label">Mã Sản Phẩm</label>
            <input type="text" name="product_code" class="form-control" value="{{ old('product_code', $product->product_code) }}" required>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Tên Sản Phẩm</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
          </div>

          <div class="mb-3">
            <label for="category_id" class="form-label">ID Danh Mục</label>
            <input type="number" name="category_id" class="form-control" value="{{ old('category_id', $product->category_id) }}" required>
          </div>

          <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">Trạng Thái</label>
            <select name="status" class="form-select" required>
              <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Kích Hoạt</option>
              <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Không Kích Hoạt</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
          <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay Lại</a>
        </form>
      </main>
    </div>
  </div>
</body>

</html>
@endsection