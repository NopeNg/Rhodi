@extends('layouts.app')

@section('content')
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
            <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" value="light" aria-label="Light" /></li>
            <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" value="dark" aria-label="Dark" /></li>
            <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" value="cyberpunk" aria-label="Cyberpunk" /></li>
            <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" value="valentine" aria-label="Valentine" /></li>
            <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" value="aqua" aria-label="Aqua" /></li>
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
    </div>
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


    @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif


      <form action="{{ route('admin.products.update', $products->product_id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <!-- Tên sản phẩm -->
  
  <!-- Tên sản phẩm -->
  <div class="mb-3">
    <label for="name" class="form-label">Tên Sản Phẩm</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $products->name) }}" >
  </div>

  <!-- ID Danh mục -->
  <div class="mb-3">
    <label for="category_id" class="form-label">ID Danh Mục</label>
    <input type="number" name="category_id" class="form-control" value="{{ old('category_id', $products->category_id) }}" >
  </div>

  <!-- Dropdown cho danh mục -->
<div class="mb-3">
  <label for="category_id" class="form-label">Danh Mục</label>
  <select name="category_id" class="form-select">
    @foreach ($categories as $category)
      <option value="{{ $category->category_id }}" {{ $products->category_id == $category->category_id ? 'selected' : '' }}>
        {{ $category->category_name }} - {{ $category->category_detail_name }}
      </option>
    @endforeach
  </select>
</div>

<!-- Dropdown cho thương hiệu -->
<div class="mb-3">
  <label for="brand_id" class="form-label">Thương Hiệu</label>
  <select name="brand_id" class="form-select">
    @foreach ($brands as $brand)
      <option value="{{ $brand->brand_id }}" {{ $products->brand_id == $brand->brand_id ? 'selected' : '' }}>
        {{ $brand->brand_name }}
      </option>
    @endforeach
  </select>
</div>


  <!-- Tổng số lượng -->
  <div class="mb-3">
    <label for="total_quantity" class="form-label">Tổng Số Lượng</label>
    <input type="number" name="total_quantity" class="form-control" value="{{ old('total_quantity', $products->total_quantity) }}">
  </div>

  <!-- Giá -->
  <div class="mb-3">
    <label for="price" class="form-label">Giá</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $products->price) }}" >
  </div>

  <!-- Hình ảnh chính -->
  <div class="mb-3">
    <label for="main_image" class="form-label">Hình Ảnh Chính</label><br>
    @if ($products->main_image)
      <img src="{{ asset('storage/' . $products->main_image) }}" alt="Product Image" width="80" class="rounded object-cover" />

    @else
      <p>Không có hình ảnh</p>
    @endif
    <input type="file" name="main_image" class="form-control">
  </div>

  <!-- Trạng thái -->
  <div class="mb-3">
    <label for="status" class="form-label">Trạng Thái</label>
    <select name="status" class="form-select" >
      <option value="active" {{ $products->status == 'active' ? 'selected' : '' }}>Kích Hoạt</option>
      <option value="inactive" {{ $products->status == 'inactive' ? 'selected' : '' }}>Không Kích Hoạt</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
  <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay Lại</a>
</form>

    </main>
  </div>
</div>
@endsection
