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
      <main class="mainn hidden-on-scroll z-10 ">
        <section class="bg-white text-black relative w-full overflow-hidden pt-2 hidden-on-scroll">
            <h2 class="text-4xl font-bold text-center text-gray-800">Các sản phẩm bán chạy</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">
                @if($products->isEmpty())
                    <p class="text-center">Không có sản phẩm nào để hiển thị.</p>
                @else
                    @foreach($products as $product)
                        <div class="card bg-base-100 w-[20vw] shadow-sm">
                            <figure>
                                <img src="{{ $product->main_image }}" alt="{{ $product->name }}" />
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">{{ $product->name }}</h2>
                                <p>{{ $product->description ?? 'Mô tả không có' }}</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-primary">Mua ngay</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
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