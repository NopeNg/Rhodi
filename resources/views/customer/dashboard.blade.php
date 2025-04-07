


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
      <li><strong>ID:</strong> {{ Auth::user()->customer_id }}</li>
      <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
      <li><strong>Họ tên:</strong> {{ Auth::user()->full_name }}</li>
      <li><strong>Mật khẩu (mã hóa):</strong> {{ Auth::user()->password }}</li>
    </ul>
  @else
  <p>Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để xem thông tin tài khoản.</p>
@endif




    <!-- Nội dung dashboard ở đây -->
     

      


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