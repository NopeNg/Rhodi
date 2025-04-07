<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Kiểm tra nếu người dùng đã đăng nhập với đúng guard
        if ($role === 'employee' && !Auth::guard('employee')->check()) {
            return redirect()->route('login')->withErrors(['login_error' => 'You must login as Employee.']);
        }
        
        if ($role === 'customer' && !Auth::guard('customer')->check()) {
            return redirect()->route('login')->withErrors(['login_error' => 'You must login as Customer.']);
        }
        
        return $next($request);
    }
}
