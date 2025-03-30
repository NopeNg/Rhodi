<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @vite(['resources/css/wel.css'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="">
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
     <x-admin_view.sidebar/>
    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col overflow-auto">
      <!-- Topbar -->
      <x-admin_view.topbar/>
      <!-- Page Content -->
      <main class="p-6 flex-1 overflow-y-auto">
        <!-- name of each tab group should be unique -->
        <div class="tabs tabs-box">
          <input id="tab1" type ="radio" name="my_tabs_6" class="tab" aria-label="Tab 1" checked="checked" />
          <div class="tab-content bg-base-100 border-base-300 p-6">
            <h1>Biểu Đồ</h1>
            <div style="width: 83%; margin: auto;">
              <canvas id="myChart"></canvas>
            </div>
          </div>
          <input id="tab2" type="radio" name="my_tabs_6" class="tab" aria-label="Tab 2" />
          <div class="tab-content bg-base-100 border-base-300 p-6">
            <h1>Báo Cáo Doanh Thu</h1>
            <div style="width: 83%; margin: auto;">
              <canvas id="revenueChart"></canvas>
            </div>
          </div>
          <input id="tab3" type="radio" name="my_tabs_6" class="tab" aria-label="Tab 3" />
          <div class="tab-content bg-base-100 border-base-300 p-6">Tab content 3</div>
        </div>
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