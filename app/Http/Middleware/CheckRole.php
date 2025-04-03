<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        // Kiểm tra người dùng đã đăng nhập và có vai trò khớp
        if (Auth::check() && session('type') === $role) {
            return $next($request);
        }

        // Chuyển hướng đến trang đăng nhập nếu không đủ quyền
        return redirect()->route('login')->withErrors(['error' => 'Bạn không có quyền truy cập.']);
    }
}
