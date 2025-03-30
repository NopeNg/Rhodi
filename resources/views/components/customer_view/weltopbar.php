<?php
namespace App\View\Components;

use DB;
use Illuminate\View\Component;
use App\Models\Category;

class Weltopbar extends Component
{
    public $categories;

    public function __construct()
    {
        $this->categories = Category::all(); // Lấy danh sách thể loại
    }

    public function render()
    {
     
        return view('components.customer_view.weltopbar', [
            'categories' => $this->categories, // Truyền dữ liệu vào view
        ]);
    }
}
