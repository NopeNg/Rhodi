@extends('layouts.app')

@section('content')
  <!DOCTYPE html>
  <html lang="en" data-theme="light">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/css/wel.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
      <div id="profile-menu" class="absolute bottom-16 left-4 w-48 rounded-md hidden shadow-lg z-20">
        <div class="p-3 border-b flex items-center gap-2">
        <span class="font-medium">haell</span>
        </div>
        <a href="profile" class="block px-4 py-2 hover:bg-gray-200 ">👤 Profile</a>
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
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
        <table class="table">
        <thead>
          <tr>
          <th>Product ID</th>
          <th>Product Code</th>
          <th>Name</th>
          <th>Category</th> <!-- Thay đổi tiêu đề -->
          <th>Price</th>
          <th>Status</th>
          <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
        <tr>
        <td>{{ $product->product_id }}</td>
        <td>{{ $product->product_code }}</td>
        <td>{{ $product->name }}</td>
        <td>
        @foreach($categories as $category)
      @if($category->id == $product->category_id) <!-- So sánh ID -->
      {{ $category->name }} <!-- Hiển thị tên danh mục -->
    @endif
    @endforeach
        </td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->status }}</td>
        <td>
        <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('products.destroy', $product->product_id) }}" method="POST"
        style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
        </tr>
      @endforeach
        </tbody>
        </table>
      </div>
      </main>
    </div>
    </div>

    <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    let myChart;

    const data = {
      labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
      datasets: [
      {
        label: 'First week',
        data: [65, 59, 80, 81, 56, 55, 40],
        borderColor: 'rgba(75, 192, 192, 1)',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        fill: false,
      },
      {
        label: 'Second week',
        data: [28, 48, 40, 19, 86, 27, 90],
        borderColor: 'rgba(255, 99, 132, 1)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        fill: false,
      },
      {
        label: 'Third week',
        data: [45, 65, 75, 60, 50, 70, 80],
        borderColor: 'rgba(255, 206, 86, 1)',
        backgroundColor: 'rgba(255, 206, 86, 0.2)',
        fill: false,
      },
      {
        label: 'Fourth week',
        data: [15, 35, 95, 50, 70, 20, 30],
        borderColor: 'rgb(243, 82, 232)',
        backgroundColor: 'rgba(255, 206, 86, 0.2)',
        fill: false,
      }
      ]
    };

    myChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: {
      scales: {
        y: {
        beginAtZero: true
        }
      },
      interaction: {
        mode: 'nearest',
        intersect: false
      }
      }
    });

    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(revenueCtx, {
      type: 'bar',
      data: {
      labels: ['January', 'February', ' March', 'April', 'May', 'June'],
      datasets: [{
        label: 'Doanh thu',
        data: [1200, 1900, 3000, 500, 2000, 3000],
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
      },
      options: {
      scales: {
        y: {
        beginAtZero: true
        }
      },
      plugins: {
        legend: {
        display: true,
        position: 'top',
        },
        title: {
        display: true,
        text: 'Báo Cáo Doanh Thu'
        }
      }
      }
    });
    </script>

    <script>
    // Hàm để thiết lập theme
    function setTheme(theme) {
      document.documentElement.setAttribute("data-theme", theme);
      localStorage.setItem("theme", theme);
      updateThemeSelection(theme);
    }

    // Hàm để cập nhật trạng thái của các radio button
    function updateThemeSelection(theme) {
      document.querySelectorAll("input[name='theme-dropdown']").forEach((input) => {
      input.checked = input.value === theme;
      });
    }

    // Hàm khởi tạo theme từ localStorage
    (function () {
      const savedTheme = localStorage.getItem("theme") || "light"; // Mặc định là "light"
      document.documentElement.setAttribute("data-theme", savedTheme);
      updateThemeSelection(savedTheme);

      // Thêm sự kiện lắng nghe cho các radio button
      document.querySelectorAll("input[name='theme-dropdown']").forEach((input) => {
      input.addEventListener("change", function () {
        setTheme(this.value);
      });
      });
    })();
    </script>

  </body>

  </html>
@endsection