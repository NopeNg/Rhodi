@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/wel.css'])
<header class="hd static h-[10vh] w-[99vw]">




    <div class="navbar color-primary-content h-[10vh] w-[100vw] fixed"
        style="background-color: #e0d7c6; z-index: 2;pt-">
        <div class="navbar-start">


            <img src="https://pos.nvncdn.com/e41e16-5527/store/20240820_jRhCzjIO.jpg" alt="Đây là logo" width="100vh"
                height="110vh">

        </div>


        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="/">TRANG CHỦ</a></li>

                @foreach($groupedCategories as $categoryName => $details)
                    <li class="dropdown dropdown-hover relative">
                        <label tabindex="0"
                            class="cursor-pointer px-4 py-2 rounded-lg text-gray-700 !hover:bg-transparent hover:text-blue-500 transition-none">
                            {{ $categoryName }}
                        </label>
                        <ul tabindex="0"
                            class="dropdown-content menu bg-base-100 rounded-box mt-2 w-40 left-1/2 -translate-x-1/2 border border-gray-200 shadow-none">
                            @foreach($details as $detail)
                                <li class="mb-2">
                                    <a href="{{ route('category.products', $detail->category_id) }}">
                                        {{ $detail->category_detail_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
hehehehehegegegege

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
                            Đây là một đoạn nội dung dài ví dụ để kiểm tra xem dropdown có tự động giãn ra và xuống dòng
                            đúng không.
                            Đây là một đoạn nội dung dài ví dụ để kiểm tra xem dropdown có tự động giãn ra và xuống dòng
                            đúng không.
                            Đây là một đoạn nội dung dài ví dụ để kiểm tra xem dropdown có tự động giãn ra và xuống dòng
                            đúng không.
                            Đây là một đoạn nội dung dài ví dụ để kiểm tra xem dropdown có tự động giãn ra và xuống dòng
                            đúng không.
                            Đây là một đoạn nội dung dài ví dụ để kiểm tra xem dropdown có tự động giãn ra và xuống dòng
                            đúng không.
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

                            <span class="badge badge-sm rounded-200 w-5 indicator-item bg-error ">8</span>
                        </div>
                    </div>

                    <div style="background-color:rgb(107, 39, 39);" tabindex="0"
                        class="card card-compact dropdown-content z-1 mt-3 w-52 shadow ">
                        <div class="card-body ">
                            <span class="text-lg font-bold">8 Items</span>
                            <span class="text-info">Subtotal: $999</span>
                            <div class="card-actions">
                                <button class="btn">View cart </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown dropdown-end dropdown-hover">
                    <div tabindex="0" role="button" class="btn btn-ghost  btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img alt="Tailwind CSS Navbar component"
                                src="https://static.thenounproject.com/png/4663410-200.png" />
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a>Settings</a></li>
                        <li><a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Đăng Xuất</button>
                                </form>
                            </a></li>
                    </ul>
                </div>
            </div>


        </div>

    </div>

</header>