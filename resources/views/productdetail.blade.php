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

  <x-weltopbar />

  <!-- Đây là nơi chứa toàn bộ nội dung -->
  <main class="mainn">
    <div class="container mx-auto p-5 shadow bg-gray-100">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Image Section -->
        <!-- <div>
                <img id="mainImage" src="https://th.bing.com/th/id/OIP.-6dsPHgctIItd41AWS0pcgHaHa?rs=1&pid=ImgDetMain" alt="Main Product Image" class="rounded-lg shadow-lg w-full">
                <div class="flex gap-2 mt-4">
                    <img onclick="changeImage(this)" src="https://mtv.vn/uploads/2023/02/25/meo-dd.jpg" class="w-20 h-20 rounded-lg cursor-pointer hover:opacity-75">
                    <img onclick="changeImage(this)" src="https://mtv.vn/uploads/2023/02/25/meo-dd.jpg" class="w-20 h-20 rounded-lg cursor-pointer hover:opacity-75">
                    <img onclick="changeImage(this)" src="https://th.bing.com/th/id/OIP.-6dsPHgctIItd41AWS0pcgHaHa?rs=1&pid=ImgDetMain" class="w-20 h-20 rounded-lg cursor-pointer hover:opacity-75">
                </div>
            </div> -->

        <div class="md:w-full ">
          <div class="relative">
            <img id="mainImage" src="https://mtv.vn/uploads/2023/02/25/meo-dd.jpg" alt="Product"
              class="w-4/5 mx-auto rounded-lg transition-all duration-300 ">

          </div>
          <div class="flex justify-center space-x-2 mt-2 relative">
            <img onclick="changeImage(this)"
              src="https://th.bing.com/th/id/OIP.-6dsPHgctIItd41AWS0pcgHaHa?rs=1&pid=ImgDetMain"
              class="w-20 h-20 cursor-pointer rounded-lg border border-gray-300">
            <img onclick="changeImage(this)" src="https://mtv.vn/uploads/2023/02/25/meo-dd.jpg"
              class="w-20 h-20 cursor-pointer rounded-lg border border-gray-300">
            <img onclick="changeImage(this)" src="https://mtv.vn/uploads/2023/02/25/meo-dd.jpg"
              class="w-20 h-20 cursor-pointer rounded-lg border border-gray-300">
            <img onclick="changeImage(this)"
              src="https://th.bing.com/th/id/OIP.-6dsPHgctIItd41AWS0pcgHaHa?rs=1&pid=ImgDetMain"
              class="w-20 h-20 cursor-pointer rounded-lg border border-gray-300">
            <button id="prevBtn"
              class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white px-2 py-1 rounded-md">❮</button>
            <button id="nextBtn"
              class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white px-2 py-1 rounded-md">❯</button>
          </div>

        </div>
        <!-- Product Details -->
        <div>
          <h1 class="text-3xl font-bold">Basic Tee</h1>
          <p class="text-xl text-gray-600">$35</p>
          <div class="mt-2">⭐⭐⭐⭐⭐</div>
          <div class="mt-4">
            <h2 class="font-semibold">Color</h2>
            <div class="flex gap-2 mt-2">
              <button class="w-8 h-8 bg-black rounded-full border-2 border-gray-400"></button>
              <button class="w-8 h-8 bg-gray-600 rounded-full border-2 border-gray-400"></button>
              <button class="w-8 h-8 bg-blue-500 rounded-full border-2 border-gray-400"></button>
            </div>
          </div>
          <div class="mt-4">
            <h2 class="font-semibold">Size</h2>
            <div class="flex gap-2 mt-2">
              <button class="btn btn-outline">XS</button>
              <button class="btn btn-outline btn-active">S</button>
              <button class="btn btn-outline">M</button>
              <button class="btn btn-outline">L</button>
              <button class="btn btn-outline">XL</button>
            </div>
          </div>
          <button class="btn btn-primary mt-4 w-full">Add to cart</button>
        </div>

   
      </div>

      <hr class="border-t border-gray-600 my-2 ">

      <div class="container mx-auto p-4 w-260">
        <!-- Chi tiết sản phẩm -->
        <div class="card bg-base-100 shadow-md p-4 ">
          <h2 class="text-xl font-bold border-b pb-2">CHI TIẾT SẢN PHẨM</h2>
          <div class="mt-2 space-y-2">
            <div class="flex justify-between border-b pb-1">
              <span class="font-semibold">Danh Mục</span>
              <span class="text-blue-600">Shopee > Phụ Kiện & Trang Sức Nữ > Mũ</span>
            </div>
            <div class="flex justify-between border-b pb-1">
              <span class="font-semibold">Số lượng hàng khuyến mãi</span>
              <span>5</span>
            </div>
            <div class="flex justify-between border-b pb-1">
              <span class="font-semibold">Số sản phẩm còn lại</span>
              <span>42</span>
            </div>
            <div class="flex justify-between border-b pb-1">
              <span class="font-semibold">Chất liệu</span>
              <span>Len</span>
            </div>
            <div class="flex justify-between border-b pb-1">
              <span class="font-semibold">Xuất xứ</span>
              <span>Trung Quốc</span>
            </div>
            <div class="flex justify-between border-b pb-1">
              <span class="font-semibold">Giới tính</span>
              <span>Unisex</span>
            </div>
            <div class="flex justify-between border-b pb-1">
              <span class="font-semibold">Kiểu nón</span>
              <span>Mũ len</span>
            </div>
            <div class="flex justify-between">
              <span class="font-semibold">Gửi từ</span>
              <span>Hà Nội</span>
            </div>
          </div>
        </div>


        <!-- Mô tả sản phẩm -->
        <div class="card bg-base-100 shadow-md p-4 mt-6">
          <h2 class="text-lg font-semibold border-b pb-2">MÔ TẢ SẢN PHẨM</h2>
          <p class="mt-4 text-gray-700">Mũ len WANXI studio dệt kim dày dặn thời trang mùa thu đông dễ phối đồ.</p>
          <ul class="list-disc pl-5 mt-2 text-gray-700">
            <li>Chất len dày dặn ấm áp cho mùa đông.</li>
            <li>Bản loại 1 chất sẽ dày dặn, hạn chế xù vải và lên form đẹp hơn bản loại 2.</li>
            <li>Đủ màu như ảnh: be - nâu - ghi - đen.</li>
          </ul>
          <p class="mt-4 text-gray-700 text-sm">* Vì điều kiện ánh sáng khác nhau nên màu sắc sản phẩm có thể chênh lệch
            so với ảnh nhưng chất lượng vẫn đảm bảo.

          </p>
        </div>
      </div>


    </div>
    </div>
    </div>
  </main>
</body>
<script>
  let images = [
    "https://th.bing.com/th/id/OIP.-6dsPHgctIItd41AWS0pcgHaHa?rs=1&pid=ImgDetMain",
    "https://mtv.vn/uploads/2023/02/25/meo-dd.jpg",
    "https://th.bing.com/th/id/OIP.-6dsPHgctIItd41AWS0pcgHaHa?rs=1&pid=ImgDetMain",
    "https://mtv.vn/uploads/2023/02/25/meo-dd.jpg"
  ];
  let currentIndex = 0;

  function changeImage(element) {
    document.getElementById('mainImage').src = element.src;
  }

  document.getElementById('prevBtn').addEventListener('click', function () {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    document.getElementById('mainImage').src = images[currentIndex];
  });

  document.getElementById('nextBtn').addEventListener('click', function () {
    currentIndex = (currentIndex + 1) % images.length;
    document.getElementById('mainImage').src = images[currentIndex];
  });
</script>






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



</html>