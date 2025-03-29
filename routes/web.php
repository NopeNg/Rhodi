<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Route cho trang chính
Route::get('/', function () {
    return view('welcome');
});

Route::get('/3', function () {
    return view('cusproduct');
});
// Route cho các trang admin
Route::get('/1', function () {
    return view('productdetail');
});

Route::get('/2', function () {
    return view('admin.index');
});

Route::get('/admin-employees', function () {
    return view('admin/employees/employeeall');
});

Route::get('/admin-emp-add', function () {
    return view('admin/employees/addemployee');
});

Route::get('/admin-emp-tracking', function () {
    return view('admin/employees/tracking');
});

Route::get('/admin-order', function () {
    return view('admin/order/order');
});

Route::get('/admin-order-detail', function () {
    return view('admin/order/orderdetail');
});

Route::get('/admin-product-approve', function () {
    return view('admin/product/approve');
});

// Route cho sản phẩm
Route::resource('products', ProductController::class);

// Route cho chi tiết sản phẩm
Route::get('/admin/product/{product_id}/details', [ProductDetailController::class, 'index'])
    ->name('product.details.index');

// Route cho quản lý khách hàng
Route::get('/admin-customer', function () {
    return view('admin/customer/manage');
});

Route::get('/admin-customer-add', function () {
    return view('admin/customer/addcustomer');
});

// Route cho quản lý danh mục
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{category_id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{category_id}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category_id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

// Route cho chỉnh sửa sản phẩm
Route::get('/products/{product_id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::put('/products/{product_id}', [ProductController::class, 'update'])->name('admin.products.update');

// Route cho tạo chi tiết sản phẩm
Route::get('/admin/product/{product_id}/details/create', [ProductDetailController::class, 'create'])->name('product.details.create');
Route::post('/admin/product/{product_id}/details', [ProductDetailController::class, 'store'])->name('product.details.store');

// Route cho chỉnh sửa chi tiết sản phẩm
Route::get('/admin/product/details/{detail_id}/edit', [ProductDetailController::class, 'edit'])->name('product.details.edit');
Route::put('/admin/product/details/{detail_id}', [ProductDetailController::class, 'update'])->name('product.details.update');

// Route cho disable chi tiết sản phẩm
Route::patch('/product/details/update-status/{id}', [ProductDetailController::class, 'updateStatus'])->name('product.details.update.status');
// Route cho thêm chi tiết sản phẩm
// Route cho thêm chi tiết sản phẩm
Route::get('/admin/product/{product_id}/details/create', [ProductDetailController::class, 'create'])->name('product.details.create');
Route::post('/admin/product/{product_id}/details', [ProductDetailController::class, 'store'])->name('product.details.store');

//Route của employee
Route::get('/employee', function () {
    return view('/employee/index.blade.php');
});

//trang info php không dùng trong demo chỉ dùng khi dev
Route::get('/info', function () {
    return view('/info');
});


//trang edit detail sp
Route::get('/admin/product/details/{product_detail_id}/edit', [ProductDetailController::class, 'edit'])->name('product.details.edit');
Route::put('/admin/product/details/{product_detail_id}', [ProductDetailController::class, 'update'])->name('product.details.update');


//trang giỏ hàng 
use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::patch('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/destroy/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');

hahaah
