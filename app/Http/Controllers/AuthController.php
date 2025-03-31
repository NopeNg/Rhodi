<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Import Auth
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Sửa lại đường dẫn view nếu cần
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    
    //     // Check employee table first
    //     $user = DB::table('employee')
    //         ->join('role', 'employee.level', '=', 'role.level')
    //         ->where('employee.email', $credentials['email'])
    //         ->select('employee.employee_id as id', 'employee.email', 'employee.password', 'role.role_name')
    //         ->first();
    
    //     $type = 'customer'; // Default to customer
    
    //     if (!$user) {
    //         // Check customer table if not found in employee
    //         $user = DB::table('customer')
    //             ->where('email', $credentials['email'])
    //             ->select('customer.customer_id as id', 'customer.email', 'customer.password')
    //             ->first();
    //     } else {
    //         $type = $user->role_name; // Retrieve role name from employee
    //     }
    
    //     if ($user && Hash::check($credentials['password'], $user->password)) {
    //         if (!empty($user->id)) {
    //             Auth::loginUsingId($user->id); // Login using aliased `id`
    
    //             return match ($type) {
    //                 'admin' => redirect()->route('admin.index'),
    //                 'staff' => redirect()->route('staff.dashboard'),
    //                 default => redirect()->route('welcome'),
    //             };
    //         }
    
    //         return redirect()->back()->withErrors(['login_error' => 'Không tìm thấy ID người dùng']);
    //     }
    
    //     return redirect()->back()->withErrors(['login_error' => 'Thông tin đăng nhập không đúng']);
    // }
    
    



    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Check employee table first
    $user = DB::table('employee')
        ->join('role', 'employee.level', '=', 'role.level')
        ->where('employee.email', $credentials['email'])
        ->select('employee.employee_id as id', 'employee.email', 'employee.password', 'role.role_name')
        ->first();

    $type = 'customer'; // Default to customer

    if (!$user) {
        // Check customer table if not found in employee
        $user = DB::table('customer')
            ->where('email', $credentials['email'])
            ->select('customer.customer_id as id', 'customer.email', 'customer.password')
            ->first();
    } else {
        $type = $user->role_name; // Retrieve role name from employee
    }

    if ($user && Hash::check($credentials['password'], $user->password)) {
        if (!empty($user->id)) {
            Auth::loginUsingId($user->id); // Login using aliased `id`
            Session::put('type', $type); // Lưu role vào session
            dd(auth()->user()); // Kiểm tra thông tin người dùng
            // Lưu role vào session
            Session::put('type', $type);  // <-- Thêm dòng này

            return match ($type) {
                'admin' => redirect()->route('admin.index'),
                'staff' => redirect()->route('staff.dashboard'),
                default => redirect()->route('welcome'),
            };
        }

        return redirect()->back()->withErrors(['login_error' => 'Không tìm thấy ID người dùng']);
    }

    return redirect()->back()->withErrors(['login_error' => 'Thông tin đăng nhập không đúng']);
}


    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất bằng Auth
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        
        return redirect()->route('login')->with('success', 'Đăng xuất thành công');
    }

    public function showWelcomePage()
    {
        $products = DB::table('products')->get(); // Lấy dữ liệu sản phẩm
        $customer = Auth::user(); // Lấy thông tin người dùng đã đăng nhập

        return view('welcome', compact('products', 'customer'));
    }
}
