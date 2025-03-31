@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="en" data-theme="light">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                                        class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
                                        aria-label="Light" value="light" /></li>
                                <li><input type="radio" name="theme-dropdown"
                                        class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
                                        aria-label="Dark" value="dark" /></li>
                                <li><input type="radio" name="theme-dropdown"
                                        class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
                                        aria-label="Cyberpunk" value="cyberpunk" /></li>
                                <li><input type="radio" name="theme-dropdown"
                                        class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
                                        aria-label="Valentine" value="valentine" /></li>
                                <li><input type="radio" name="theme-dropdown"
                                        class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
                                        aria-label="Aqua" value="aqua" /></li>
                            </ul>
                        </details>
                    </li>
                </ul>

                <!-- Profile dropdown -->
                <div class="relative mt-auto p-4">
                    <button id="profile-btn" class="flex items-center p-2 rounded-lg w-full hover:bg-neutral-300">
                        <span class="text-sm font-medium flex-grow text-center"> 👤 heallll</span>
                    </button>
                    <div id="profile-menu" class="absolute bottom-16 left-4 w-48 rounded-md hidden shadow-lg z-20 bg-white">
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
                <div class="p-4 shadow flex items-center">
                    <button id="toggleSidebar" class="px-4 py-2 rounded-md mr-4 border">☰</button>
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

                        <div class="mb-4">
                            <a href="{{ route('product.details.create', ['product_id' => $product_id]) }}"
                                class="btn btn-primary">Thêm Chi Tiết Sản Phẩm</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr class="border">
                                    <th class="border">Product Detail Id</th>
                                    <th class="border">Product ID</th>
                                    <th class="border">Product Code</th>
                                    <th class="border">Description</th>
                                    <th class="border">Stock Quantity</th>
                                    <th class="border">Size</th>
                                    <th class="border">Color</th>
                                    <th class="border">Cost</th>
                                    <th class="border">Profit Margin</th>
                                    <th class="border">Selling Price</th>
                                    <th class="border">Status</th>
                                    <th class="border">Image</th>
                                    <th class="border">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupedProductDetails as $productDetailId => $productDetails)
                                    @foreach($productDetails as $index => $pds)
                                        @if ($index === 0) <!-- Chỉ hiển thị thông tin sản phẩm cho bản ghi đầu tiên -->
                                            <tr class="border">
                                                <td class="border">{{ $pds->product_detail_id }}</td>
                                                <td class="border">{{ $pds->product_id }}</td>
                                                <td class="border">{{ $pds->product_code }}</td>
                                                <td class="border">{{ $pds->description }}</td>
                                                <td class="border">{{ $pds->stock_quantity }}</td>
                                                <td class="border">{{ $pds->size }}</td>
                                                <td class="border">{{ $pds->color }}</td>
                                                <td class="border">{{ $pds->cost }}</td>
                                                <td class="border">{{ $pds->profit_margin }} %</td>
                                                <td class="border">{{ $pds->selling_price }}</td>
                                                <td class="border">{{ $pds->status }}</td>
                                                <td class="border">
                                                    <div class="carousel-container relative w-[500px] h-[400px] max-w-full overflow-hidden"
                                                        id="carousel-{{ $productDetailId }}">
                                                        <div
                                                            class="carousel-wrapper flex transition-transform duration-500 ease-in-out">
                                                            @foreach($productDetails as $image)
                                                                <div class="flex-shrink-0 w-[300px]">
                                                                @if (!empty($image->image_url))
                                                                    <img src="{{ asset('storage/' . $image->image_url) }}" 
                                                                    class="object-cover rounded-lg shadow carouselimg contain-img" alt="Product Image">
                                                                @else
                                                                    <span>No Image</span>
                                                                @endif

                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <!-- Nút điều hướng -->
                                                        <button
                                                            class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full prev-btn">❮</button>
                                                        <button
                                                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full next-btn">❯</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown dropdown-end">
                                                        <button tabindex="0" class="btn btn-sm">Actions ⏷</button>
                                                        <ul tabindex="0"
                                                            class="dropdown-content z-[1] menu p-2 shadow rounded-box w-52 bg-gray-300">
                                                            <li>
                                                                <a href="{{ route('product.details.edit', $pds->product_detail_id) }}">✏️
                                                                    Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="">📋 Restock List</a>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('product.details.update.status', $pds->product_detail_id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input type="hidden" name="status" value="discontinued">
                                                                    <button type="submit" class="text-yellow-500 hover:text-red-700"
                                                                        onclick="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái sản phẩm này thành Discontinued?');">🔄
                                                                        Discontinued</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>

        <!-- JavaScript -->
        <script>
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            const profileBtn = document.getElementById('profile-btn');
            const profileMenu = document.getElementById('profile-menu');

            let isOpen = true;

            toggleBtn.addEventListener('click', () => {
                isOpen = !isOpen;
                sidebar.style.width = isOpen ? '220px' : '0px';
            });

            profileBtn.addEventListener('click', () => {
                profileMenu.classList.toggle('hidden');
            });

            window.addEventListener('click', (e) => {
                if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
                    profileMenu.classList.add('hidden');
                }
            });

            // Theme switching
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

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll("[id^='carousel-']").forEach(carousel => {
                    let wrapper = carousel.querySelector(".carousel-wrapper");
                    let slides = carousel.querySelectorAll(".flex-shrink-0");
                    let prevBtn = carousel.querySelector(".prev-btn");
                    let nextBtn = carousel.querySelector(".next-btn");
                    let currentIndex = 0;

                    function updateCarousel() {
                        let slideWidth = slides[0].offsetWidth; // Lấy width thực tế
                        let offset = -currentIndex * slideWidth;
                        wrapper.style.transform = `translateX(${offset}px)`;
                    }

                    nextBtn.addEventListener("click", function () {
                        currentIndex = (currentIndex + 1) % slides.length;
                        updateCarousel();
                    });

                    prevBtn.addEventListener("click", function () {
                        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                        updateCarousel();
                    });

                    updateCarousel(); // Cập nhật carousel ban đầu
                });
            });
        </script>

    </body>

    </html>

@endsection