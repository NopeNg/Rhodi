<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\FormatService;
class ProductController extends Controller
{

    protected $format;

    public function __construct(FormatService $format)
    {
        $this->format = $format;
    }
    

    
    public function index()
    {
        
        $products = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.category_id')
            ->select('products.*', 'category.category_name', 'category.category_detail_name')
            ->get();


            $products->transform(function ($detail) {
                $detail->price = $this->format->currencyVN($detail->price);
                return $detail;
            });
    

        return view('admin.product.product', compact('products'));
    }

    

    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'category_id' => 'required|integer|exists:category,category_id',
    //         'total_quantity' => 'required|integer|min:0',
    //         'price' => 'required|numeric|min:0',
    //         'status' => 'required|in:active,inactive',
    //         'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //     ]);

    //     // Xử lý ảnh nếu có
    //     $mainImagePath = null;
    //     if ($request->hasFile('main_image')) {
    //         $mainImagePath = $request->file('main_image')->store('images', 'public');
    //     }

    //     // Lưu sản phẩm
    //     Products::create([
    //         'name' => $request->name,
    //         'category_id' => $request->category_id,
    //         'total_quantity' => $request->total_quantity,
    //         'price' => $request->price,
    //         'status' => $request->status,
    //         'main_image' => $mainImagePath,
    //     ]);

    //     return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    // }

   
   
   
   
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:category,category_id',
            'total_quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:102400',
        ]);
    
        // Bước 1: Tạo sản phẩm trước, chưa có ảnh
        $product = Products::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'total_quantity' => $request->total_quantity,
            'price' => $request->price,
            'status' => $request->status,
            'main_image' => null, // Tạm thời null
        ]);
    
        // Bước 2: Nếu có ảnh thì lưu vào thư mục thumbnail
        if ($request->hasFile('main_image')) {
            // Tạo tên tệp duy nhất cho hình ảnh
            $filename = time() . '_' . $request->file('main_image')->getClientOriginalName();
            
            // Lưu hình ảnh vào thư mục public/thumbnail
            $path = $request->file('main_image')->storeAs('thumbnail', $filename, 'public');
    
            // Cập nhật lại đường dẫn ảnh trong cơ sở dữ liệu
            $product->update([
                'main_image' => $path,
            ]);
        }
    
        // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    }
    
   
    public function edit($product_id)
    {
        $products = Products::findOrFail($product_id);
        return view('admin.product.edit', compact('products'));
    }

    public function update(Request $request, $product_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:category,category_id',
            'total_quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Products::findOrFail($product_id);

        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('images', 'public');
        } else {
            $mainImagePath = $product->main_image;
        }

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'total_quantity' => $request->total_quantity,
            'price' => $request->price,
            'status' => $request->status,
            'main_image' => $mainImagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật.');
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->productDetails()->delete();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa.');
    }
}
