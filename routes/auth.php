<?php
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerRegisterController;
use Illuminate\Support\Facades\Route;

// Hiển thị form đăng ký cho khách hàng
Route::get('/register', [CustomerRegisterController::class, 'showRegisterForm'])->name('register.form');
// Xử lý đăng ký
Route::post('/register', [CustomerRegisterController::class, 'register'])->name('register');

// Hiển thị form đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
// Xử lý đăng nhập
Route::post('/login', [AuthController::class, 'login'])->name('login');
//vào trang welcome
Route::get('/welcome', [AuthController::class, 'showWelcomePage'])->name('welcome');

// Đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Hiển thị đăng ký tài khoản nhân viên do admin cấp trong trang admin dashboard
// Chỉ admin mới có quyền truy cập trang này


// Chỉ admin mới có quyền truy cập trang này

// Route hiển thị biểu mẫu thêm nhân viên






// Route hiển thị biểu mẫu thêm nhân viên


// Route hiển thị form thêm nhân viên
Route::get('/admin/employees/addemployee', [AdminStaffController::class, 'showCreateStaffForm'])->name('admin.createStaffForm');

// Route xử lý thêm nhân viên
Route::post('/admin/employees/addemployee', [AdminStaffController::class, 'createStaff'])->name('admin.createStaff');

// Route hiển thị danh sách nhân viên
Route::get('/admin/employees/employeeall', function () {
    return view('admin.employees.employeeall');
})->name('admin.employeeList');

Route::get('/admin/employees/employeeadd', function () {
    return view('admin.employees.addemployee');
})->name('admin.addemployee');



