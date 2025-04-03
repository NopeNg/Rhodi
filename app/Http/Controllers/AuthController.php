<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Xác thực người dùng
use Illuminate\Support\Facades\Hash; // Xử lý mật khẩu
use Illuminate\Support\Facades\Session; // Quản lý session
use Illuminate\Support\Facades\DB; // Truy vấn cơ sở dữ liệu

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login'); // Hiển thị form login (tạo trong views/auth/login.blade.php)
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('employee')
            ->join('role', 'employee.level', '=', 'role.level')
            ->where('employee.email', $credentials['email'])
            ->select('employee.employee_id as id', 'employee.email', 'employee.password', 'role.role_name')
            ->first();

        $type = 'customer';

        if (!$user) {
            $user = DB::table('customer')
                ->where('email', $credentials['email'])
                ->select('customer.customer_id as id', 'customer.email', 'customer.password')
                ->first();
        } else {
            $type = $user->role_name;
        }

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::loginUsingId($user->id);
            $request->session()->regenerate();

            // Thêm thông báo vào session
            session()->flash('success', 'Đăng nhập thành công!');

            // Chuyển hướng người dùng tới trang welcome
            return match ($type) {
                'admin' => redirect()->route('admin.index'),
                'staff' => redirect()->route('staff.dashboard'),
                default => redirect()->route('welcome'),
            };
        }

        return redirect()->back()->withErrors(['login_error' => 'Thông tin đăng nhập không đúng.']);
    }


    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Xóa toàn bộ session
        $request->session()->regenerateToken(); // Tạo lại CSRF token

        return redirect()->route('login')->with('success', 'Đăng xuất thành công');
    }

    // Hiển thị trang chào mừng (welcome) sau khi đăng nhập thành công
    public function showWelcomePage()
    {
        $products = DB::table('products')->get(); // Lấy danh sách sản phẩm
        $customer = Auth::user(); // Lấy thông tin người dùng đã đăng nhập

        return view('welcome', compact('products', 'customer')); // Truyền dữ liệu sang view welcome
    }
}
