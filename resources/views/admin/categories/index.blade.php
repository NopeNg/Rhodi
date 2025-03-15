<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Category Management</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>
</head>
<body>

  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside id="sidebar" class="transition-all duration-300 w-[220px] shadow-lg flex flex-col bg-white">
      <h1 class="text-xl font-bold p-4">Admin Panel</h1>
      <ul class="menu flex-grow space-y-2 px-4">
        <li><a href="/dashboard" class="flex items-center gap-2 hover:bg-gray-200 rounded-lg p-2">🏠 Dashboard</a></li>
        <li>
          <details class="group">
            <summary class="flex items-center gap-2 cursor-pointer hover:bg-gray-200 rounded-lg p-2">
              💎 Categories
            </summary>
            <ul class="ml-4 space-y-1 group-open:block">
              <li><a href="/admin-categories" class="hover:underline">Manage Categories</a></li>
              <li><a href="/admin-categories/add" class="hover:underline">Add Category</a></li>
            </ul>
          </details>
        </li>
      </ul>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-auto">
      <!-- Topbar -->
      <header class="p-4 shadow bg-white flex items-center">
        <button id="toggleSidebar" class="px-4 py-2 rounded-md mr-4 btn btn-outline">☰</button>
        <h2 class="text-xl font-bold">Category Management</h2>
      </header>

      <!-- Page Content -->
      <main class="p-6 flex-1 overflow-y-auto">
        <h1 class="text-2xl font-bold mb-4">Danh sách loại sản phẩm</h1>

        <!-- Grid.js Table -->
        <div id="gridjs-table"></div>
      </main>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    // Headers and category data from the server
    const headers = ['ID danh mục', 'Tên danh mục', 'Mô tả'];
    const data = @json($categories).map(category => [
      category.category_id, 
      category.category_name, 
      category.description || 'Không có mô tả'
    ]);

    // Render Grid.js Table
    new gridjs.Grid({
      columns: headers,
      data: data,
      search: true,          // Enable searching
      pagination: {
        limit: 10             // Show 10 rows per page
      },
      className: {
        table: 'bg-white text-black',
        thead: 'bg-gray-100',
        td: 'bg-white text-black'
      }
    }).render(document.getElementById('gridjs-table'));
  </script>

  <script>
    // Sidebar toggle functionality
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    let isOpen = true;

    toggleBtn.addEventListener('click', () => {
      isOpen = !isOpen;
      sidebar.style.width = isOpen ? '220px' : '0';
    });
  </script>

</body>
</html>
