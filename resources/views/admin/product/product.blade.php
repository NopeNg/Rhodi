@extends('layouts.app')

@section('content')

  <!DOCTYPE html>
  <html lang="en" data-theme="light">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>

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
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Light"
            value="light" /></li>
          <li><input type="radio" name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Dark"
            value="dark" /></li>
          <li><input type="radio" name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Cyberpunk"
            value="cyberpunk" /></li>
          <li><input type="radio" name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Valentine"
            value="valentine" /></li>
          <li><input type="radio" name="theme-dropdown"
            class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Aqua"
            value="aqua" /></li>
        </ul>
        </details>
      </li>
      </ul>

      <!-- Profile dropdown -->
      <div class="relative mt-auto p-4">
      <button id="profile-btn" class="flex items-center p-2 rounded-lg w-full hover:bg-neutral-300">
        <span class="text-sm font-medium flex-grow text-center"> 👤 heallll</span>
      </button>
      <div id="profile-menu" class="absolute bottom-16 left-4 w-48 rounded-md hidden shadow-lg z-20 bg-white">
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
      <button id="toggleSidebar" class="px-4 py-2 rounded-md mr-4 ">☰</button>
      <h2 class="text-xl font-bold">Dashboard</h2>
      </div>

      <!-- Page Content -->
      <main class="p-6 flex-1 overflow-y-auto">
      <div class="container">
        <h1>Product List</h1>
        @if(session('success'))
      <div class="alert alert-success">
      {{ session('success') }}
      </div>
    @endif
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
        <table class="table">
        <thead>
          <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Category Name</th>
          <th>Category Detail Name</th>
          <th>Brand Name</th>
          <th>Main image</th>
          <th>Status</th>
          <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
        <tr>
        <td>{{ $product->product_id }}</td>
        <td>{{ $product->pname }}</td>
        <td>{{ $product->category_name }}</td>
        <td>{{ $product->category_detail_name }}</td>
        <td>{{ $product -> brand_name }}</td>

        <td>
        @if($product->main_image)
      <img src="{{ asset('storage/' . $product->main_image) }}" alt="Product Image" width="80"
      class="rounded object-cover" />

    @else
    <span>No Image</span>
  @endif
        </td>
        <td>{{ $product->status }}</td>
        <td>
        <div class="dropdown dropdown-end">
        <button tabindex="0" class="btn btn-sm">Actions ⏷</button>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow rounded-box w-52 bg-gray-300">
          <li>
          <a href="{{ route('products.edit', $product->product_id) }}">✏️ Edit</a>
          </li>
          <li>
          <a href="{{ route('product.details.index', ['product_id' => $product->product_id]) }}">📋 Detail
          List</a>
          </li>
          <li>
          <a href="{{ route('product.details.create', ['product_id' => $product->product_id]) }}"
          >➕ Add detail</a>
          </li>
          <li>
          <form action="{{ route('products.destroy', $product->product_id) }}" method="POST"
          onsubmit="return confirm('Are you sure?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-500">🗑️ Delete</button>
          </form>
          </li>
        </ul>
        </div>
        </td>
        </tr>
      @endforeach
        </tbody>
        </table>
      </div>
      </main>
    </div>
    </div>

    <!-- JavaScript -->
  
  </body>
  <script id="script for theme">
    function setTheme(theme) {
    document.documentElement.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
    updateThemeSelection(theme);
    }

    function updateThemeSelection(theme) {
    document.querySelectorAll("input[name='theme-dropdown']").forEach((input) => {
      input.checked = input.value === theme;
    });
    }

    (function () {
    const savedTheme = localStorage.getItem("theme") || "light";
    document.documentElement.setAttribute("data-theme", savedTheme);
    updateThemeSelection(savedTheme);

    document.querySelectorAll("input[name='theme-dropdown']").forEach((input) => {
      input.addEventListener("change", function () {
      setTheme(this.value);
      });
    });
    })();
  </script>

  </html>
@endsection



