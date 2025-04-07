<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;

Route::middleware(['auth:employee'])->get('/admin/dashboard', [InfoController::class, 'dashboard'])->name('admin.dashboard');

// Admin routes
Route::middleware(['auth:employee', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {



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
    Route::get('/admin/product/{product_id}/details', [ProductDetailController::class, 'index'])->name('product.details.index');
    Route::get('/admin-customer', function () {
        return view('admin/customer/manage');
    });
    Route::get('/admin-customer-add', function () {
        return view('admin/customer/addcustomer');
    });
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category_id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category_id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category_id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('/admin/product/{product_id}/details/create', [ProductDetailController::class, 'create'])->name('product.details.create');
    Route::post('/admin/product/{product_id}/details', [ProductDetailController::class, 'store'])->name('product.details.store');
    
});

