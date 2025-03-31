<?php

namespace App\Http\Controllers;
use App\Services\FormatService;

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

    protected $formatService;

    public function __construct(FormatService $formatService)
    {
        $this->formatService = $formatService;
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
                'product_detail.dname as product_detail_name',
                'category.*',
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


    public function getTotalStockByProductIdInCategory($category_id)
    {
        $productStocks = DB::table('product_detail')
            ->join('products', 'product_detail.product_id', '=', 'products.product_id')
            ->where('products.category_id', $category_id) // Lọc theo `category_id`
            ->where('products.status', 'active') // Chỉ lấy sản phẩm đang hoạt động
            ->select(
                'products.product_id', // Lấy mã sản phẩm
                'products.pname', // Lấy tên sản phẩm (nếu cần thiết)
                DB::raw('SUM(product_detail.stock_quantity) as total_stock') // Tính tổng số lượng
            )
            ->groupBy('products.product_id', 'products.pname') // Nhóm theo ID sản phẩm
            ->get();
    
        return $productStocks; // Trả về dữ liệu đã tính tổng theo từng `product_id`
    }
        
    

    // Hiển thị sản phẩm theo category_id
    public function showc($category_id)
    {
        $prdt = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.category_id')
            ->join('brand', 'products.brand_id', '=', 'brand.brand_id')
            ->select(
                'products.product_id',
                'category.*',
                'products.pname as name',
                'brand.*',
                'products.main_image'
            )
            ->where('products.status', 'active') // Điều kiện trạng thái "active"
            ->where('products.category_id', $category_id) // Lấy sản phẩm theo chi tiết thể loại sản phẩm
            ->distinct() // Chỉ lấy các dòng khác nhau
            ->get();

        // // Tính tổng stock_quantity
        // $totalStock = DB::table('products')
        //     ->join('product_detail', 'products.product_id', '=', 'product_detail.product_id')
        //     ->where('products.status', 'active')
        //     ->where('products.category_id', $category_id)
        //     ->sum('product_detail.stock_quantity');

    //     $totalStock = DB::table('products')
    // ->join('product_detail', 'products.product_id', '=', 'product_detail.product_id')
    // ->where('products.status', 'active')
    // ->where('products.category_id', $category_id)
    // ->select('products.product_id', DB::raw('SUM(product_detail.stock_quantity) as total_stock'))
    // ->groupBy('products.product_id')
    // ->get();
    // $totalStock = DB::table('products')
    // ->join('product_detail', 'products.product_id', '=', 'product_detail.product_id')
    // ->where('products.status', 'active')
    // ->where('products.category_id', $category_id)
    // ->select('products.product_id', 'products.pname', DB::raw('SUM(product_detail.stock_quantity) as total_stock'))
    // ->groupBy('products.product_id', 'products.pname') // Nhóm theo product_id hoặc các thuộc tính khác
    // ->get();


        // dd($totalStock);

        $prices = DB::table('products')
            ->join('product_detail', 'products.product_id', '=', 'product_detail.product_id')
            ->where('products.status', 'active')
            ->where('products.category_id', $category_id)
            ->select(
                'products.product_id',
                DB::raw('MIN(product_detail.selling_price) as min_price'),
                DB::raw('MAX(product_detail.selling_price) as max_price')
            )
            ->groupBy('products.product_id')
            ->get()
            ->map(function ($item) {
                // Sử dụng FormatService để format giá
                $item->min_price = $this->formatService->currencyVN($item->min_price);
                if ($item->min_price === $item->max_price) {
                    $item->max_price = null; // Không hiển thị max_price khi giống nhau
                } else {
                    $item->max_price = $this->formatService->currencyVN($item->max_price);
                }
                return $item;
            })
            ->keyBy('product_id');
 // Calculate total stock
//  $totalStock = $this->calculateTotalStock($category_id);
$productStocks = $this->getTotalStockByProductIdInCategory($category_id);

return view('customer.show', [
            'prdt' => $prdt,
            'category_id' => $category_id,// Truyền category_id vào view nếu cần
            'productStocks' => $productStocks, // Truyền tổng số lượng vào view
            'prices' => $prices, // Truyền giá min/max vào view nếu cần
        ]);
    }

    // Hiển thị sản phẩm theo category_id
    // public function showProductsByCategory($category_id)
    // {
    //     $category = Category::findOrFail($category_id);
    //     $products = Products::where('category_id', $category_id)->get();

    //     return view('cusproduct', compact('category', 'products'));
    // }

    // Lấy danh sách thể loại cho dropdown
    public function getCategories()
    {
        $categories = Category::select('category_name', 'category_detail_name')->get();
        $groupedCategories = $categories->groupBy('category_name');
        return view('components.customer_view.weltopbar', compact('groupedCategories'));

    }
}