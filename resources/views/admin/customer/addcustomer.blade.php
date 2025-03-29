<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

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
      sidebar.style.width = isOpen ? '220px' : '0';
    });

    profileBtn.addEventListener('click', () => {
      profileMenu.classList.toggle('hidden');
    });

    // Click ngoài để ẩn menu profile
    window.addEventListener('click', (e) => {
      if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
        profileMenu.classList.add('hidden');
      }
    });
  </script>
</body>
<script id="script for theme">
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
