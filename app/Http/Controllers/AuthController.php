<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('\auth\login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kiểm tra trong bảng employee trước
        $user = DB::table('employee')
            ->join('role', 'employee.level', '=', 'role.level')
            ->where('employee.email', $credentials['email'])
            ->select('employee.*', 'role.role_name')
            ->first();

        if ($user) {
            // Nếu tìm thấy trong bảng employees, lấy role từ bảng roles
            $type = $user->role_name;
        } else {
            // Nếu không tìm thấy trong bảng employee, kiểm tra trong bảng customers
            $user = DB::table('customer')
                ->where('email', $credentials['email'])
                ->select('customer.*')
                ->first();
            $type = 'customer'; // Mặc định gán role là 'customer'
        }

        // Kiểm tra mật khẩu
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Lưu vào session
            Session::put('user', $user);
            Session::put('type', $type);

            // Chuyển hướng dựa trên role
            return match ($type) {
                'admin' => redirect()->route('admin.index'),
                'staff' => redirect()->route('staff.dashboard'),
                default => redirect()->route('welcome'),
                        };
        } else {
            return redirect()->back()->withErrors(['login_error' => 'Thông tin đăng nhập không đúng']);
        }
    }

    public function showWelcomePage()
{
    // Lấy danh sách sản phẩm từ cơ sở dữ liệu
    $products = DB::table('products')->get();

    // Lấy thông tin khách hàng từ Session
    $customer = Session::get('customer');

    return view('welcome', compact('products', 'customer'));
}


    // Đăng xuất
    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('success', 'Đăng xuất thành công');
    }
}
