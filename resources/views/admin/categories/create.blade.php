@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create Category</title>

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
              <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Light" value="light" /></li>
              <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Dark" value="dark" /></li>
              <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Cyberpunk" value="cyberpunk" /></li>
              <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Valentine" value="valentine" /></li>
              <li><input type="radio" name="theme-dropdown" class="theme-controller w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Aqua" value="aqua" /></li>
            </ul>
          </details>
        </li>
      </ul>

      <!-- Profile dropdown -->
      <div class="relative mt-auto p-4">
        <button id="profile-btn" class="flex items-center p-2 rounded-lg w-full hover:bg-neutral-300">
          <span class="text-sm font-medium flex-grow text-center">👤 heallll</span>
        </button>
        <div id="profile-menu" class="absolute bottom-16 left-4 w-48 rounded-md hidden shadow-lg z-20">
          <div class="p-3 border-b flex items-center gap-2">
            <span class="font-medium">haell</span>
          </div>
          <div class="flex flex-col p-2 bg-white rounded-md shadow-lg">
            <a href="#" class="p-2 hover:bg-gray-200">Profile</a>
            <a href="#" class="p-2 hover:bg-gray-200">Settings</a>
            <a href="#" class="p-2 hover:bg-gray-200">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="flex-grow p-6">
      <h2 class="text-2xl font-bold mb-4">Create New Category</h2>
      <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
          <label for="category_name" class="block text-sm font-medium text-gray-700">Category Name</label>
          <input type="text" name="category_name" id="category_name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" />
          @error('category_name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-4">
          <label for="category_detail_name" class="block text-sm font-medium text-gray-700">Category Detail Name</label>
          <input type="text" name="category_detail_name" id="category_detail_name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" />
          @error('category_detail_name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit" class="mt-4 btn btn-primary text-white px-4 py-2 rounded-md">Create Category</button>
      </form>
    </div>
  </div>
</body>

</html>
@endsection