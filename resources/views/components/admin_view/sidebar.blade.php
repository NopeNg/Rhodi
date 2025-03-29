<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/wel.css'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="sidebar"
        class="transition-all duration-300  w-[220px] h-screen overflow-hidden shadow-lg flex flex-col h-200">
        <h1 class="text-xl font-bold p-4">Admin Panel</h1>
        <ul class="menu flex-grow space-y-2 px-4">
            <li><a href="/2" class="flex items-center gap-2">🏠 Dashboard</a></li>
            <li><a href="admin-employees">👨‍💼 Employees</a></li>
            <li><a href="admin-customer">👨 Users </a></li>
            <li><a href="/products">💎 Products</a></li>
            <li><a class="flex items-center gap-2">📊 Reports</a></li>
            <li>
                <details class="group">
                    <summary tabindex="0" class="flex items-center gap-2 cursor-pointer"> 🎨 Theme </summary>
                    <ul tabindex="0" class=" mt-4 ml-1 space-y-1 hidden group-open:block">
                        <li><input type="radio" name="theme-dropdown"
                                class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
                                aria-label="Light" value="light" /></li>
                        <li><input type="radio" name="theme-dropdown"
                                class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start"
                                aria-label="Dark" value="dark" /></li>
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
                <a href="/login" class="block px-4 py-2 hover:bg-gray-200">👤 Profile</a>
                <a href="logout" class="block px-4 py-2 text-red -500 hover:bg-gray-100">🚪 Logout</a>
            </div>
        </div>
    </div>

    <!-- nội dung nhét vào đây -->
</body>

<script>
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


</html>