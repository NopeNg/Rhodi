<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminStaffController extends Controller
{
    public function showCreateStaffForm()
    {
        return view('admin.employees.addemployee'); // Đường dẫn phải khớp với file blade trong thư mục view   
    }

    public function createStaff(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'full_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:100|unique:employee,email',
            'phone'      => 'nullable|string|max:20|regex:/^[0-9\-\+\(\) ]+$/',
            'address'    => 'nullable|string',
            'birth'      => 'nullable|date|before:today',
            'level'      => 'nullable|integer',
            'hire_date'  => 'nullable|date|before_or_equal:today',
            'password'   => 'required|string|min:6|max:255',
        ]);

        try {
            // Lưu vào database (bảng employee)
            DB::table('employee')->insert([
                'code'       => 'EMP' . str_pad(DB::table('employee')->count() + 1, 3, '0', STR_PAD_LEFT),
                'full_name'  => $request->full_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'address'    => $request->address,
                'birth'      => $request->birth,
                'hire_date'  => $request->hire_date ?? now(),
                'password'   => Hash::make($request->password),
                'level'      => $request->level ?? 1,
            ]);

            // Thông báo thành công
            return redirect()->route('admin.createStaffForm')->with('success', 'Tạo tài khoản Staff thành công!');
        } catch (\Exception $e) {
            // Thông báo thất bại
            return redirect()->route('admin.createStaffForm')->with('error', 'Có lỗi xảy ra. Vui lòng thử lại!');
        }
    }
}