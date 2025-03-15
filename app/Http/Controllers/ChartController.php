<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        return view('chart');
    }

    public function getData()
    {
        // Dữ liệu mẫu, bạn có thể thay đổi theo nhu cầu
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'values' => [65, 59, 80, 81, 56, 55, 40]
        ];

        return response()->json($data);
    }
}