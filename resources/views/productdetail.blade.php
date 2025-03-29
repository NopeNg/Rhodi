<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <x-weltopbar />

  <main class="mainn">
    <div class="container mx-auto p-5 shadow bg-gray-100">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Phần ảnh sản phẩm -->
        <div class="md:w-full">
          <div class="relative">
            @if($cusprodet[0]->image_url)
              <img id="mainImage" src="{{ asset('storage/' . $cusprodet[0]->image_url) }}" alt="Product Image" class="rounded shadow-lg w-180 h-18git rebase --continue
0">
            @else
              <span>No Image Available</span>
            @endif
          </div>

          <div class="flex justify-center space-x-2 mt-2 relative">
            @foreach($cusprodet as $images)
              <img onclick="changeImage(this)" src="{{ asset('storage/' . $images->image_url) }}"
                class="w-20 h-20 cursor-pointer rounded-lg border border-gray-300">
            @endforeach
            <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white px-2 py-1 rounded-md">❮</button>
            <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white px-2 py-1 rounded-md">❯</button>
          </div>
        </div>

        <!-- Phần chi tiết sản phẩm -->
        <div>
          <h1 class="text-3xl font-bold">{{ $cusprodet[0]->product_detail_name }}</h1>
          <p class="text-xl text-gray-600">${{ $cusprodet[0]->selling_price }}</p>
          <div class="mt-2">⭐⭐⭐⭐⭐</div>

          <div class="mt-4">
            <h2 class="font-semibold">Color</h2>
            <div class="flex gap-2 mt-2">
              @foreach($uniqueColors as $color)
                <button class="w-8 h-8 btn btn-outline" style="background-color: {{ trim($color) }}" title="{{ $color }}"></button>
              @endforeach
            </div>
          </div>

          <div class="mt-4">
            <h2 class="font-semibold">Size</h2>
            <div class="flex gap-2 mt-2">
              @foreach($cusprodet as $detail)
                <button class="btn btn-outline">{{ trim($detail->size) }}</button>
              @endforeach
            </div>
          </div>

          <button class="btn btn-primary mt-4 w-full bg-pink">Add to cart</button>
        </div>
      </div>

      <!-- Mô tả sản phẩm -->
      <div class="container mx-auto p-4 w-260">
        <div class="card bg-base-100 shadow-md p-4">
          <h2 class="text-xl font-bold border-b pb-2">CHI TIẾT SẢN PHẨM</h2>
          <div class="mt-2 space-y-2">
            <div class="flex justify-between border-b pb-1">
              <span class="font-semibold">Danh Mục</span>
              <span class="text-blue-600">{{ $cusprodet[0]->category_name }} > {{ $cusprodet[0]->category_detail_name }}</span>
            </div>
            <div class="flex justify-between border-b pb-1">
              <span class="font-semibold">Số sản phẩm còn lại</span>
              <span>{{ $cusprodet[0]->total_quantity }}</span>
            </div>
            <!-- Thêm các thuộc tính sản phẩm khác... -->
          </div>
        </div>
        <div class="card bg-base-100 shadow-md p-4 mt-6">
          <h2 class="font-semibold">Description</h2>
          <p class="mt-2">{{ $cusprodet[0]->description }}</p>
        </div>
      </div>
    </div>
  </main>

  <footer class="footer sm:footer-horizontal">
    <nav>
      <h6 class="footer-title">Services</h6>
      <a class="link link-hover">Branding</a>
      <a class="link link-hover">Design</a>
    </nav>
    <nav>
      <h6 class="footer-title">Company</h6>
      <a class="link link-hover">About us</a>
      <a class="link link-hover">Contact</a>
    </nav>
    <form>
      <h6 class="footer-title">Newsletter</h6>
      <fieldset class="w-80">
        <label>Enter your email address</label>
        <div class="join">
          <input type="text" placeholder="username@site.com" class="input input-bordered join-item">
          <button class="btn btn-primary join-item">Subscribe</button>
        </div>
      </fieldset>
    </form>
  </footer>
</body>
<script>
  document.addEventListener("DOMContentLoaded", () => {
  // Lấy danh sách ảnh từ HTML
  let images = [...document.querySelectorAll('.flex img')].map(img => img.src);
  let currentIndex = 0;

  // Gán ảnh đầu tiên làm ảnh chính
  const mainImage = document.getElementById('mainImage');
  mainImage.src = images[currentIndex];

  // Hàm thay đổi ảnh chính
  window.changeImage = (element) => {
    mainImage.src = element.src; // Thay đổi ảnh chính
    currentIndex = images.indexOf(element.src); // Cập nhật vị trí hiện tại
  };

  // Xử lý sự kiện khi nhấn nút Prev
  document.getElementById('prevBtn').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length; // Quay vòng về cuối nếu vượt qua đầu
    mainImage.src = images[currentIndex];
  });
ga
  // Xử lý sự kiện khi nhấn nút Next
  document.getElementById('nextBtn').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % images.length; // Quay vòng về đầu nếu vượt qua cuối
    mainImage.src = images[currentIndex];
  });
});

</script>
</html>
