@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

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
        <button id="toggleSidebar" class="px-4 py-2 rounded-md mr-4">☰</button>
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
          <div class="mb-4">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm Chi Tiết Sản Phẩm</a>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>Product Detail Id</th>
                <th>Product ID</th>
                <th>Product Code</th>
                <th>Description</th>
                <th>Brand</th>
                <th>Stock Quantity</th>
                <th>Size</th>
                <th>Color</th>
                <th>Cost</th>
                <th>Profit Margin</th>
                <th>Discount Rate</th>
                <th>Selling Price</th>
                <th>Status</th>
                <th>Imported At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($productDetails as $pds)
                <tr>
                  <td>{{ $pds->product_detail_id }}</td>
                  <td>{{ $pds->product_id }}</td>
                  <td>{{ $pds->product_code }}</td>
                  <td>{{ $pds->description }}</td>
                  <td>{{ $pds->brand }}</td>
                  <td>{{ $pds->stock_quantity }}</td>
                  <td>{{ $pds->size }}</td>
                  <td>{{ $pds->color }}</td>
                  <td>{{ $pds->cost }}</td>
                  <td>{{ $pds->profit_margin }} %</td>
                  <td>{{ $pds->discount_rate }} %</td>
                  <td>{{ $pds->selling_price }}</td>
                  <td>{{ $pds->status }}</td>
                  <td>{{ $pds->imported_at }}</td>
                  <td>
                    <div class="relative inline-block text-left">
                      <div>
                        <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="menu-button-{{ $pds->product_detail_id }}" aria-expanded="true" aria-haspopup="true">
                          Actions
                          <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>

                      <div class="absolute right-0 z-10 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button {{ $pds->product_detail_id }}" tabindex="-1">
                        <div class="py-1" role="none">
                          <a href="{{ route('products.edit', $pds->product_detail_id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sửa</a>
                          <form action="{{ route('products.destroy', $pds->product_detail_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Xóa</button>
                          </form>
                          <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Bù Hàng</a>
                        </div>
                      </div>
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

    // Click outside to hide profile menu
    window.addEventListener('click', (e) => {
      if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
        profileMenu.classList.add('hidden');
      }
    });

    // Dropdown menu for actions
    document.querySelectorAll('[id^="menu-button-"]').forEach(button => {
      button.addEventListener('click', (event) => {
        const menu = event.currentTarget.nextElementSibling;
        menu.classList.toggle('hidden');
      });
    });

    // Click outside to hide action menus
    window.addEventListener('click', (e) => {
      if (!e.target.closest('.relative')) {
        document.querySelectorAll('.absolute').forEach(menu => {
          menu.classList.add('hidden');
        });
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

@endsection