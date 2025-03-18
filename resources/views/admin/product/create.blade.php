<!-- <form action="{{ route('products.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="product_code" class="form-label">Mã Sản Phẩm</label>
    <input type="text" name="product_code" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Tên Sản Phẩm</label>
    <input type="text" name="name" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="category_id" class="form-label">ID Danh Mục</label>
    <input type="number" name="category_id" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Giá</label>
    <input type="number" name="price" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Trạng Thái</label>
    <select name="status" class="form-select" required>
      <option value="active">Kích Hoạt</option>
      <option value="inactive">Không Kích Hoạt</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
  <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay Lại</a>
</form> -->







<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="">

  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div id="sidebar" class="transition-all duration-300  w-[220px] overflow-hidden shadow-lg flex flex-col">
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
        <div id="profile-menu" class="absolute bottom-16 left-4 w-48 rounded-md hidden  shadow-lg z-20">
          <div class="p-3 border-b flex items-center gap-2">
            <span class="font-medium">haell</span>
          </div>
          <a href="profile" class="block px-4 py-2 hover:bg-gray-200">👤 Profile</a>
          <a href="logout" class="block px-4 py-2 text-red -500 hover:bg-gray-100">🚪 Logout</a>
        </div>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col overflow-auto">
      <!-- Topbar -->
      <div class=" p-4 shadow flex items-center">
        <button id="toggleSidebar" class="  px-4 py-2 rounded-md mr-4">☰</button>
        <h2 class="text-xl font-bold">Dashboard</h2>
      </div>

      <!-- Page Content -->
      <main class="p-6 flex-1 overflow-y-auto">
        <!-- name of each tab group should be unique -->
      

        <form action="{{ route('products.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="product_code" class="form-label">Product Code</label>
    <input type="text" name="product_code" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="category_id" class="form-label">Category Id</label>
    <input type="number" name="category_id" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select" required>
      <option value="active">Approve</option>
      <option value="inactive">Not Approve</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Add New Product</button>
  <a href="{{ route('products.index') }}" class="btn btn-secondary">Return</a>
</form>





      </main>
    </div>
  </div>

  <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    let myChart;

    const data = {
      labels: ['1', '2', '3', '4', '5', '6', '7','8','9','10','11','12'],
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
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
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
      document.querySelectorAll("input[name='theme-dropdown']"). forEach((input) => {
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