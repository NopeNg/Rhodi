<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CusProController extends Controller
{
    // Hiển thị sản phẩm theo id và category ở trang welcome
    public function index(Request $request)
    {
        // Lấy tham số category_name từ request
        $categoryName = $request->input('category_name');

        $cuspro = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.category_id')
            ->join('product_detail', 'products.product_id', '=', 'product_detail.product_id')
            ->join('brand', 'products.brand_id', '=', 'brand.brand_id')
            ->where('products.status', 'active') // Điều kiện trạng thái "active"
            ->when($categoryName, function ($query, $categoryName) {
                return $query->where('category.category_name', $categoryName); // Điều kiện lọc theo category_name
            })
            ->get();

        // Lấy tất cả các danh mục
        $categories = Category::all();

        return view('welcome', [
            'products' => $cuspro,
            'categories' => $categories // Truyền biến categories vào view
        ]);
    }

    // Hiển thị sản phẩm chi tiết
    public function show($product_id)
    {
        $cusprodet = DB::table('product_detail')
            ->join('products', 'product_detail.product_id', '=', 'products.product_id')
            ->join('category', 'products.category_id', '=', 'category.category_id')
            ->leftJoin('image', 'product_detail.product_code', '=', 'image.product_code')
            ->select(
                'products.*',
                'image.*',
                'product_detail.product_code',
                'product_detail.name as product_detail_name',
                'category.*',
                'product_detail.brand',
                'product_detail.description',
                'product_detail.size',
                'product_detail.color',
                'product_detail.selling_price',
                'product_detail.status'
            )
            ->where('product_detail.product_id', $product_id)
            ->where('product_detail.status', 'available')
            ->get(); // Lấy tất cả các product_detail của sản phẩm

        if ($cusprodet->isEmpty()) {
            return abort(404);
        }

        $uniqueColors = $cusprodet->pluck('color')->unique();

        return view('productdetail', [
            'cusprodet' => $cusprodet,
            'uniqueColors' => $uniqueColors
        ]);
    }

    // Hiển thị sản phẩm theo category_id
    public function showc($category_id)
    {
        $prdt = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.category_id')
            ->join('product_detail', 'products.product_id', '=', 'product_detail.product_id')
            ->join('brand', 'products.brand_id', '=', 'brand.brand_id')
            ->select(
                'category.*',
                'products.*',
                'brand.*',
                'product_detail.*'
            )
            ->where('products.status', 'active') // Điều kiện trạng thái "active"
            ->where('products.category_id', $category_id) // Lấy sản phẩm theo chi tiết thể loại sản phẩm
            ->get();

        return view('customer.show', [
            'products' => $prdt,
            'category_id' => $category_id // Truyền category_id vào view nếu cần
        ]);
    }

    // Hiển thị sản phẩm theo category_id
    public function showProductsByCategory($category_id)
    {
        $category = Category::findOrFail($category_id);
        $products = Products::where('category_id', $category_id)->get();

        return view('products.index', compact('category', 'products'));
    }

    // Lấy danh sách thể loại cho dropdown
    public function getCategories()
    {
        $categories = Category::select('category_name', 'category_detail_name')->get();
        $groupedCategories = $categories->groupBy('category_name');
        return view('components.customer_view.weltopbar', compact('groupedCategories'));
      
    }
}