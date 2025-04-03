<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Nếu đã đăng nhập, chuyển hướng tới trang welcome
            return redirect('/'); // Hoặc route('welcome')
        }

        return $next($request);
    }
}
