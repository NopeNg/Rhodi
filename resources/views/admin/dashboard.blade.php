<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app') {{-- Hoặc layout bạn đang dùng --}}

@section('content')
    <div class="container">
        <h1>Xin chào Admin 👋</h1>
        <p>Chào mừng bạn đến trang quản trị.</p>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thông tin nhân viên</h1>
        <ul>
            <li><strong>Mã NV:</strong> {{ $employee->code }}</li>
            <li><strong>Họ tên:</strong> {{ $employee->full_name }}</li>
            <li><strong>Email:</strong> {{ $employee->email }}</li>
            <li><strong>SĐT:</strong> {{ $employee->phone }}</li>
            <li><strong>Địa chỉ:</strong> {{ $employee->address }}</li>
            <li><strong>Ngày sinh:</strong> {{ $employee->birth }}</li>
            <li><strong>Ngày vào làm:</strong> {{ $employee->hire_date }}</li>
            <li><strong>Chức vụ:</strong> {{ $employee->role_name }}</li>
        </ul>
    </div>
@endsection
