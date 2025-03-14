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
        <div id="profile-menu" class="absolute bottom-16 left-4 w-48 rounded-md hidden  shadow-lg z-20">
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
      <div class=" p-4 shadow flex items-center">
        <button id="toggleSidebar" class="  px-4 py-2 rounded-md mr-4">☰</button>
        <h2 class="text-xl font-bold">Dashboard</h2>
      </div>

      <!-- Page Content -->
      <main class="p-6 flex-1 overflow-y-auto">
        <!-- name of each tab group should be unique -->
<div class="tabs tabs-box">
  <input id="tab1" type="radio" name="my_tabs_6" class="tab" aria-label="Tab 1" checked="checked"/>
  <div class="tab-content bg-base-100 border-base-300 p-6">Tab content 1



<!-- ApexCharts CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" />

<!-- ApexCharts JS -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1"></script>


<div id="comparison-line-chart"></div>

<script>
  var options = {
    chart: {
      type: 'line',
      height: 400,
      toolbar: {
        show: true
      }
    },
    series: [
      {
        name: 'Cửa hàng A',
        data: [120, 132, 101, 134, 90, 230, 210, 180, 160, 190, 220, 240]
      },
      {
        name: 'Cửa hàng B',
        data: [90, 100, 80, 120, 60, 180, 190, 200, 170, 180, 200, 210]
      }
    ],
    xaxis: {
      categories: [
        'Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6',
        'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'
      ],
      title: {
        text: 'Tháng'
      }
    },
    yaxis: {
      title: {
        text: 'Doanh thu (triệu đồng)'
      }
    },
    title: {
      text: 'So sánh doanh thu giữa Cửa hàng A và B (năm 2024)',
      align: 'center',
      style: {
        fontSize: '18px'
      }
    },
    colors: ['#007bff', '#28a745'],
    stroke: {
      curve: 'smooth',
      width: 3
    },
    markers: {
      size: 5
    },
    tooltip: {
      shared: true,
      intersect: false
    },
    legend: {
      position: 'top'
    }
  };

  var chart = new ApexCharts(document.querySelector("#comparison-line-chart"), options);
  chart.render();
</script>



  


  </div>
  <input id="tab2" type="radio" name="my_tabs_6" class="tab" aria-label="Tab 2" />
  <div class="tab-content bg-base-100 border-base-300 p-6">Tab content 2</div>
  <input id="tab3" type="radio" name="my_tabs_6" class="tab" aria-label="Tab 3" />
  <div class="tab-content bg-base-100 border-base-300 p-6">Tab content 3</div>
</div>
      </main>
    </div>
  </div>

  <!-- sidebar Script -->
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
  <!-- end sidebar script -->
</body>
<!-- script theme -->
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
<!-- end scripte theme -->

  <!-- ApexCharts -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1"></script>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
  let tabs = document.querySelectorAll(".tab");
  let contents = document.querySelectorAll(".tab-content");

  tabs.forEach((tab) => {
    tab.addEventListener("change", function () {
      let tabId = this.id;

      // Ẩn tất cả tab content
      contents.forEach((c) => c.classList.remove("active"));

      // Hiển thị nội dung tab được chọn
      document.querySelector(`[data-tab="${tabId}"]`).classList.add("active");

      // Nếu là Tab 1 -> chạy lại hiệu ứng của biểu đồ
      if (tabId === "tab1") {
        restartChartAnimation();
      }
    });
  });

  function restartChartAnimation() {
    let chartContainer = document.querySelector("#comparison-line-chart");

    // Ẩn rồi hiển thị lại để tạo hiệu ứng
    chartContainer.style.opacity = "0";
    setTimeout(() => {
      chartContainer.style.opacity = "1";
      chart.render(); // Render lại biểu đồ
    }, 300);
  }
});

</script>
  <!-- end script chart -->


</html>
