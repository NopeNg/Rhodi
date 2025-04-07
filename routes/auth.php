<?php
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CusProController;

// Hiển thị form đăng ký cho khách hàng
Route::get('/register', [CustomerRegisterController::class, 'showRegisterForm'])->name('register.form');
// Xử lý đăng ký
Route::post('/register', [CustomerRegisterController::class, 'register'])->name('register');

// Hiển thị form đăng nhập
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// Các route cho Admin, Staff, và Customer
// Route::middleware(['auth:employee', 'role:admin'])->get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// Route::middleware(['auth:employee', 'role:staff'])->get('staff/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');
Route::middleware(['auth:customer'])->get('customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');


Route::middleware(['auth:customer'])->get('/main', [CusProController::class, 'index'])->name('welcome');








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





Route::middleware(['auth'])->group(function () {
    // Route cho Employee
    // Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])
    //     ->middleware('role:employee'); // Kiểm tra xem người dùng có là employee không

    // Route cho Customer
    Route::get('welcome', [CustomerRegisterController::class, 'dashboard'])
        ->middleware('role:customer'); // Kiểm tra xem người dùng có là customer không
});