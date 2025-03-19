<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Route cho trang chính
Route::get('/', function () {
    return view('welcome');
});

// Route cho các trang admin
Route::get('/1', function () {
    return view('productdetail');
});

Route::get('/2', function () {
    return view('admin.index');
});

Route::get('/admin-emp-all', function () {
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
Route::resource(name: 'products', controller: ProductController::class);

// Route cho chi tiết sản phẩm

// Route::get(uri: '/admin/product/productdetail', [ProductDetailController::class, 'index'])->name('admin.product.productdetail.index');





    Route::get('/admin/product/{product_id}/details', [ProductDetailController::class, 'index'])
    ->name('product.details');







// Route cho quản lý khách hàng
Route::get('/admin-customer-manage', function () {
    return view('admin/customer/manage');
});

Route::get('/admin-customer-add', function () {
    return view('admin/customer/addcustomer');
});

// Route cho quản lý danh mục
Route::get('/admin/categories', action: [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', action: [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{category_id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{category_id}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category_id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');



Route::get('/products/{product_id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');

Route::put('/products/{product_id}', [ProductController::class, 'update'])->name('admin.products.update');
Route::get('/admin/product/create', [ProductDetailController::class, 'create'])->name('product.details.create');
Route::post('/admin/product', [ProductDetailController::class, 'store'])->name('product.details.store');