<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/1', function () {
    return view('productdetail');
});
Route::get('/2', function () {
    return view('admin\index');
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
Route::get('/admin-product', function () {
    return view('admin/product/product');
});
Route::get('/admin-product-approve', function () {
    return view('admin/product/approve');
});
Route::get('/admin-customer-manage', function () {
    return view('admin/customer/manage');
});
Route::get('/admin-customer-add', function () {
    return view('admin/customer/addcustomer');
});
// use App\Http\Controllers\UserController;

// Route::prefix('users')->group(function () {
//     Route::get('/', [UserController::class, 'index'])->name('users.index');
//     Route::get('/create', [UserController::class, 'create'])->name('users.create');
//     Route::post('/', [UserController::class, 'store'])->name('users.store');
//     Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
//     Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
//     Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
//     Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
// });

