<?php
// app/Http/Controllers/InfoController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class InfoController extends Controller
{
    public function dashboard()
    {
        $employeeId = Auth::guard('employee')->id();
    
        $employee = DB::table('employee')
            ->join('role', 'employee.level', '=', 'role.level')
            ->where('employee.employee_id', $employeeId)
            ->select(
                'employee.code',
                'employee.full_name',
                'employee.email',
                'employee.phone',
                'employee.address',
                'employee.birth',
                'employee.hire_date',
                'role.role_name'
            )
            ->first();
    
        return view('admin.dashboard', compact('employee'));
    }
}
