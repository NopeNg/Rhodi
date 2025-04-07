<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerRegisterController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('auth.register'); // Trả về trang đăng ký (resources/views/auth/register.blade.php)
    }

    // Xử lý đăng ký khách hàng
    public function register(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:customer,email',
            'phone'    => 'required|regex:/^0[0-9]{9}$/',
            'address' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
           

        ]);

        // Lưu vào database (bảng customer)
        DB::table('customer')->insert([
            'full_name'       => $request->full_name,
            'phone'           => $request->phone,
            'email'      => $request->email,
            'address'   => $request->address,
            'password'   => Hash::make($request->password),
            'created_at' => now(),
        ]);


          // Lấy ID của khách hàng vừa đăng ký và lưu vào session
    $customerId = DB::table('customer')
    ->where('email', $request->email)
    ->first()
    ->customer_id;

        // Lưu thông tin vào session (nếu cần)
        Session::put('customer_id', $customerId);


        // Chuyển hướng về trang đăng nhập sau khi đăng ký thành công
        return redirect()->route('login.form')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}
