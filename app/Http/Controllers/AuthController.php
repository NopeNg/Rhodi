<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Customer;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kiểm tra đăng nhập cho Employee
        $employee = Employee::where('email', $credentials['email'])->first();
        if ($employee && Auth::guard('employee')->attempt($credentials)) {
            $role = $employee->role->role_name;

            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'staff') {
                return redirect()->route('staff.dashboard');
            }
        }

        // Kiểm tra đăng nhập cho Customer
        $customer = Customer::where('email', $credentials['email'])->first();
        if ($customer && Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('customer.dashboard');
        }

        return back()->withErrors(['login_error' => 'Invalid credentials']);
    }

    // Xử lý logout
    public function logout()
    {
        if (Auth::guard('employee')->check()) {
            Auth::guard('employee')->logout();
        }
    
        if (Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout();
        }
    
        return redirect()->route('login.form');
    }
    
}
