<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @vite(entrypoints: 'resources/css/wel.css')

</head>

<body class="">
  <!-- Đây là đầu trang  -->
  <header class="hd static h-[10vh] w-[99vw]">




    <div class="navbar color-primary-content h-[10vh] w-[100vw] fixed"
      style="background-color: #e0d7c6; z-index: 2;pt-">
      <div class="navbar-start">
        

        <img src="https://pos.nvncdn.com/e41e16-5527/store/20240820_jRhCzjIO.jpg" alt="Đây là logo" width="100vh"
          height="110vh">

      </div>


      <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
          <li><a>TRANG CHỦ</a></li>

          <li>
            <div class="dropdown dropdown-hover relative">
              <label tabindex="0" class="cursor-pointer">QUẦN</label>
              <ul tabindex="0"
                class="dropdown-content menu bg-base-100 shadow rounded-box mt-2 w-40 left-1/2 -translate-x-1/2">
                <li><a>Item 1</a></li>
                <li><a>Item 2</a></li>
              </ul>
            </div>
          </li>


          <li>
            <div class="dropdown dropdown-hover relative">
              <label tabindex="0" class="cursor-pointer">ÁO</label>
              <ul tabindex="0"
                class="dropdown-content menu bg-base-100 shadow rounded-box mt-2 w-40 left-1/2 -translate-x-1/2">

                <li><a>Item 1</a></li>
                <li><a>Item 2</a></li>
              </ul>
            </div>
          </li>

          <li>
            <div class="dropdown dropdown-hover relative">
              <label tabindex="0" class="cursor-pointer">PHỤ KIỆN</label>
              <ul tabindex="0"
                class="dropdown-content menu bg-base-100 shadow rounded-box mt-2 w-40 left-1/2 -translate-x-1/2">

                <li><a>Item 1</a></li>
                <li><a>Item 2</a></li>
              </ul>
            </div>
          </li>

          <li>
            <div class="dropdown dropdown-hover relative">
              <label tabindex="0" class="cursor-pointer">QUÀ TẶNG</label>
              <ul tabindex="0"
                class="dropdown-content menu bg-base-100 shadow rounded-box mt-2 w-40 left-1/2 -translate-x-1/2">

                <li><a>Item 1</a></li>
                <li><a>Item 2</a></li>
              </ul>
            </div>
          </li>

          <li><a>BEST SELLER</a></li>
          <li><a>HÀNG MỚI VỀ</a></li>
          <li><a>XU HƯỚNG</a></li>
          <li><a>LIÊN HỆ</a></li>

          
        </ul>
      </div>


      <div class="navbar-end">
        <div class="flex-none">




          <div class="dropdown dropdown-end dropdown-hover">
  <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
    <div class="indicator">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
      <span class="badge badge-xs badge-primary indicator-item">11</span>
    </div>
  </div>
  <div tabindex="0"
  class="card card-compact dropdown-content bg-black z-10 mt-3 shadow p-4 w-auto min-w-[17rem] max-w-[26rem] max-h-[20vh] overflow-y-auto break-words">
  <span class="text-lg font-bold text-white">8 Items</span>
    <span class="text-info">Subtotal: $999</span>
    <p class="text-white">
      Đây là một đoạn nội dung dài ví dụ để kiểm tra xem dropdown có tự động giãn ra và xuống dòng đúng không.
      Đây là một đoạn nội dung dài ví dụ để kiểm tra xem dropdown có tự động giãn ra và xuống dòng đúng không.
      Đây là một đoạn nội dung dài ví dụ để kiểm tra xem dropdown có tự động giãn ra và xuống dòng đúng không.
      Đây là một đoạn nội dung dài ví dụ để kiểm tra xem dropdown có tự động giãn ra và xuống dòng đúng không.
      Đây là một đoạn nội dung dài ví dụ để kiểm tra xem dropdown có tự động giãn ra và xuống dòng đúng không.
    </p>
    <button class="btn bg-black btn-block mt-2">View cart</button>
  </div>
</div>


          <div class="dropdown dropdown-end dropdown-hover">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle bg-white">
              <div class="indicator">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>

                <span class="badge badge-sm indicator-item">8</span>
              </div>
            </div>

            <div tabindex="0" class="card card-compact dropdown-content bg-black z-1 mt-3 w-52 shadow ">
              <div class="card-body ">
                <span class="text-lg font-bold">8 Items</span>
                <span class="text-info">Subtotal: $999</span>
                <div class="card-actions">
                  <button class="btn bg-black btn-block">View cart</button>
                </div>
              </div>
            </div>
          </div>

          <div class="dropdown dropdown-end dropdown-hover">
            <div tabindex="0" role="button" class="btn btn-ghost  btn-circle avatar">
              <div class="w-10 rounded-full">
                <img alt="Tailwind CSS Navbar component"
                  src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
              </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
              <li>
                <a class="justify-between">
                  Profile
                  <span class="badge">New</span>
                </a>
              </li>
              <li><a>Settings</a></li>
              <li><a>Logout</a></li>
            </ul>
          </div>
        </div>


      </div>

    </div>

  </header>

  <!-- Đây là nơi chứa toàn bộ nội dung -->
  <main class="mainn">



  <!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100">

    <div class="max-w-6xl mx-auto py-10 px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white p-6 rounded-xl shadow-lg">
        
        <!-- Ảnh sản phẩm -->
        <div>
          <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Sản phẩm" class="rounded-lg w-full object-cover" />
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="space-y-5">
          <h1 class="text-4xl font-bold text-gray-800">Áo Hoodie Unisex</h1>
          <p class="text-gray-600 text-lg">
            Áo hoodie chất vải nỉ dày, mềm mịn, giữ ấm cực tốt. Thiết kế form rộng, unisex, phù hợp cả nam và nữ.
          </p>
          <p class="text-2xl font-semibold text-red-500">450.000₫</p>

          <!-- Chọn size -->
          <div>
            <label class="block mb-2 font-semibold">Chọn size:</label>
            <select class="select select-bordered w-full max-w-xs">
              <option>S</option>
              <option>M</option>
              <option>L</option>
              <option>XL</option>
            </select>
          </div>

          <!-- Hành động -->
          <div class="flex gap-4 mt-4">
            <button class="btn btn-primary">Thêm vào giỏ</button>
            <button class="btn btn-outline">Mua ngay</button>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>


</main>


 
  <!-- Đây là cuối trang -->
  <footer class="ft footer sm:footer-horizontal  ">
 


    <nav>
      <h6 class="footer-title">Services</h6>
      <a class="link link-hover">Branding</a>
      <a class="link link-hover">Design</a>
      <a class="link link-hover">Marketing</a>
      <a class="link link-hover">Advertisement</a>
    </nav>
    <nav>
      <h6 class="footer-title">Company</h6>
      <a class="link link-hover">About us</a>
      <a class="link link-hover">Contact</a>
      <a class="link link-hover">Jobs</a>
      <a class="link link-hover">Press kit</a>
    </nav>
    <nav>
      <h6 class="footer-title">Legal</h6>
      <a class="link link-hover">Terms of use</a>
      <a class="link link-hover">Privacy policy</a>
      <a class="link link-hover">Cookie policy</a>
    </nav>
    <form>
      <h6 class="footer-title">Newsletter</h6>
      <fieldset class="w-80">
        <label>Enter your email address</label>
        <div class="join">
          <input type="text" placeholder="username@site.com" class="input input-bordered join-item" />
          <button class="btn btn-primary join-item">Subscribe</button>
        </div>
      </fieldset>
    </form>

  </footer>

</body>



</html>