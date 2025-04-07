<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/wel.css'])

</head>

<body class="">
  <!-- Đây là đầu trang  -->
  <x-weltopbar />




  <!-- Đây là nơi chứa toàn bộ nội dung -->
  <main class="mainn hidden-on-scroll z-10 ">
    @if(session('success'))
    <div style="color: green; font-weight: bold;">
      {{ session('success') }}
    </div>
  @endif

    <h1>Chào mừng đến với ứng dụng!</h1>
    <p>Chúc bạn một ngày tốt lành.</p>

    @if(Auth::check())
    <h2>Thông tin tài khoản của bạn</h2>
    <ul>
      <li><strong>ID:</strong> {{ Auth::user()->id }}</li>
      <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
      <li><strong>Họ tên:</strong> {{ Auth::user()->full_name }}</li>
      <li><strong>Mật khẩu (mã hóa):</strong> {{ Auth::user()->password }}</li>
    </ul>
  @else
  <p>Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để xem thông tin tài khoản.</p>
@endif

@if(Session::has('customerId'))
    <p>Your customer ID is: {{ Session::get('customerId') }}</p>
@endif


    <!-- Banner Carousel -->
    <div class="relative w-full overflow-hidden h-[90vh] ">
      <!-- Slide Items -->
      <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out" id="slide1">
        <img src="https://pos.nvncdn.com/e41e16-5527/bn/20241024_o70FW3pT.gif" class="w-full h-full object-cover" />
      </div>
      <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out" id="slide2">
        <img src="https://pos.nvncdn.com/e41e16-5527/bn/20241024_lbizEIy4.gif" class="w-full h-full object-cover" />
      </div>
      <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out" id="slide3">
        <img src="https://pos.nvncdn.com/e41e16-5527/bn/20241024_o70FW3pT.gif" class="w-full h-full object-cover" />
      </div>
      <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out" id="slide4">
        <img src="https://pos.nvncdn.com/e41e16-5527/bn/20241024_lbizEIy4.gif" class="w-full h-full object-cover" />
      </div>

      <!-- Navigation Buttons -->
      <div class="absolute top-1/2 left-0 right-0 flex justify-between px-4 transform -translate-y-1/2">
        <button id="prevBtn" class="text-black text-3xl hover:scale-110 transition-transform">❮</button>
        <button id="nextBtn" class="text-black text-3xl hover:scale-110 transition-transform">❯</button>
      </div>
    </div>

    <!-- Nội dung bên dưới banner -->
    <section class=" bg-white text-black relative w-full overflow-hidden h-[90vh] hidden-on-scroll pt-2">

      <img src="https://pos.nvncdn.com/e41e16-5527/bn/20250221_Oyf7aamb.gif" alt="">
    </section>


    <section class=" bg-white text-black relative w-full overflow-hidden pt-2 hidden-on-scroll">

      <h2 class="text-4xl font-bold text-center text-gray-800"> Các sản phẩm bán chạy</h2>

      <!-- QUẦN -->
      <div class="hidden-on-scroll">

        <h2 class="text-6xl text-center font-bold pt-2 ">Quần</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">

          <!-- Card 1 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

          <!-- Card 1 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

          <!-- Card 1 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

        </div>


        <!-- Bạn có thể thêm nhiều card tương tự tại đây -->
      </div>

      <div class="divider divider-neutral hidden-on-scroll">Rhodi</div>


      <!-- ÁO -->
      <div class="hidden-on-scroll">

        <h2 class="text-6xl text-center font-bold pt-2 font-serif ">Áo</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">

          <!-- Card 1 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

          <!-- Card 1 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

          <!-- Card 1 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

        </div>


        <!-- Bạn có thể thêm nhiều card tương tự tại đây -->
      </div>

      <div class="divider divider-neutral hidden-on-scroll">Rhodi</div>


      <!-- Phụ kiện -->
      <div class="hidden-on-scroll">

        <h2 class="text-4xl text-center font-bold pt-2 font-serif ">Phụ kiện</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">

          <!-- Card 1 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

          <!-- Card 1 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

          <!-- Card 1 -->
          <div class="card bg-base-100 w-[20vw] shadow-sm">
            <figure>
              <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">Card Title 1</h2>
              <p>Mô tả ngắn cho sản phẩm 1</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          </div>

        </div>


        <!-- Bạn có thể thêm nhiều card tương tự tại đây -->
      </div>


    </section>


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