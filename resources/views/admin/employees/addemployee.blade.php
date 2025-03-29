<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
  @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger">
    {{ session('error') }}
    </div>
  @endif

  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <x-admin_view.sidebar />
    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col overflow-auto">
      <!-- Topbar -->
      <x-admin_view.topbar />
      <!-- Page Content -->
      <main class="p-6 flex-1 overflow-y-auto">
        <h2 class="text-2xl font-bold mb-4">Tạo Tài Khoản Staff</h2>

        @if(session('success'))
      <p class="text-green-600 mb-4">{{ session('success') }}</p>
    @endif

        <form action="{{ route('admin.createStaff') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
          @csrf
          <div class="grid gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <!-- <div>
      <label for="code" class="block text-sm font-medium text-gray-700">Employee Code</label>
      <input class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
             type="text" id="code" name="code" placeholder="" required>
    </div> -->
              <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Name</label>
                <input
                  class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                  type="text" id="full_name" name="full_name" placeholder="Name" required>
              </div>
            </div>

            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                type="email" id="email" name="email" placeholder="Email" required>
            </div>

            <div>
              <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
              <input
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                type="text" id="phone" name="phone" placeholder="Phone Number">
            </div>

            <div>
              <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
              <textarea
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                id="address" name="address" placeholder="Address"></textarea>
            </div>

            <div>
              <label for="birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
              <input
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                type="date" id="birth" name="birth" required>
            </div>

            <div>
              <label for="hire_date" class="block text-sm font-medium text-gray-700">Hire Date</label>
              <input
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                type="date" id="hire_date" name="hire_date" required>
            </div>

            <div>
              <label for="level" class="block text-sm font-medium text-gray-700">Role</label>
              <select
                class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                id="level" name="level">
                <option value="1" selected>Staff</option>
              </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                  class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                  type="password" id="password" name="password" placeholder="Password" required>
              </div>
              <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                  Password</label>
                <input
                  class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                  type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"
                  required>
              </div>
            </div>

            <button
              class="mt-4 w-full p-3 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 transition duration-200"
              type="submit">Create</button>
          </div>

        </form>
      </main>


    </div>
  </div>

</body>

</html>