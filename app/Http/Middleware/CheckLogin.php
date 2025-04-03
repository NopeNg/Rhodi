<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['message' => 'Bạn cần đăng nhập để tiếp tục.']);
        }

        // Determine user type and role (if applicable)
        $userType = Session::get('type'); // Assuming "type" is stored in session during login

        // If user is an employee, check their role
        if ($userType === 'admin') {
            // Admin role check (additional restrictions can be added here if needed)
            return $next($request);
        }

        if ($userType === 'staff') {
            // Staff role check
            return $next($request);
        }

        // For customers or invalid types, allow limited access
        if ($userType === 'customer') {
            return $next($request);
        }

        // Redirect unauthorized users
        return redirect()->route('login')->withErrors(['message' => 'Quyền truy cập bị từ chối.']);
    }
}
