@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Category</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>
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
          <span class="text-sm font-medium flex-grow text-center">👤 heallll</span>
        </button>
        <div id="profile-menu" class="absolute bottom -16 left-4 w-48 rounded-md hidden shadow-lg z-20">
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
        <button id="toggleSidebar" class="px-4 py-2 rounded-md mr-4 border hover:bg-gray-300 delay-100">☰</button>
        <h2 class="text-xl font-bold">Create Category</h2>
      </div>

      <!-- Page Content -->
      <main class="p-6 flex-1 overflow-y-auto">
        <div class="container mt-4">
          <!-- Hiển thị thông báo thành công -->
          @if(session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
        </div>
      @endif

          <!-- Hiển thị lỗi validate -->
          @if($errors->any())
        <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
        </ul>
        </div>
      @endif

          <!-- Form tạo mới -->
          <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label for="category_detail_name">Tên cũ: </label>
              <input class="w-200" value="{{ old('category_name', $category->category_name) }} " disabled></input>
            </div>

            <div class="form-group mb-3">
              <label for="category_detail_name">Chi tiết danh mục cũ: </label>
              <input class="w-200 bg-gray-200"
                value="{{ old('category_detail_name', $category->category_detail_name) }} " disabled></input>
            </div>

            <div class="form-group mb-3">
              <label for="category_name">Tên danh mục</label>
                      <input type="text" name="category_name" class="form-control border" required>
            </div>

            <div class="form-group mb-3">
              <label for="category_detail_name">Chi tiết danh mục</label>
              <input type="text" name="category_detail_name" class="form-control border" required>
            </div>

            <button type="submit" class="btn btn-primary">Tạo mới</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
          </form>
        </div>
      </main>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const profileBtn = document.getElementById('profile-btn');
    const profileMenu = document.getElementById('profile-menu');

    let isOpen = true;

    toggleBtn.addEventListener('click', () => {
      isOpen = !isOpen;
      sidebar.style.width = isOpen ? '220px' : '0';
    });

    profileBtn.addEventListener('click', () => {
      profileMenu.classList.toggle('hidden');
    });

    // Click ngoài để ẩn menu profile
    window.addEventListener('click', (e) => {
      if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
        profileMenu.classList.add('hidden');
      }
    });
  </script>
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