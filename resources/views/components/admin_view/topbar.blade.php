<div class=" p-4 shadow flex items-center">
        <button id="toggleSidebar" class="  px-4 py-2 rounded-md mr-4">☰</button>
        <h2 class="text-xl font-bold">Dashboard</h2>
      </div>

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