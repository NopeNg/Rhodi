<?php

namespace App\Http\Controllers;
use App\Models\Brand;
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
            ->join('brand','products.brand_id', '=','brand.brand_id')
            ->select('products.*', 'category.category_name', 'category.category_detail_name','brand.*')
            ->get();
        $products->transform(function ($detail) {
            return $detail;
        });
        return view('admin.product.product', compact('products'));
    }



    public function create()
    {
        // Fetch unique categories
        $categories = Category::select('category_name', 'category_detail_name', 'category_id')
            ->distinct()
            ->get();
    
        // Fetch all category details for dynamic linking
        $categoryDetails = Category::all();
    
        // Fetch all brands
        $brands = Brand::select('brand_id', 'brand_name')->get();
        return view('admin.product.create', compact('categories', 'categoryDetails', 'brands'));
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





    // public function store(Request $request)
    // {
    //     // Xác thực dữ liệu đầu vào
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'category_id' => 'required|integer|exists:category,category_id',
    //         'status' => 'required|in:active,inactive',
    //         'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:102400',
    //     ]);

    //     // Bước 1: Tạo sản phẩm trước, chưa có ảnh
    //     $product = Products::create([
    //         'pname' => $request->name,
    //         'category_id' => $request->category_id,
    //         'status' => $request->status,
    //         'main_image' => null, // Tạm thời null
    //     ]);

    //     // Bước 2: Nếu có ảnh thì lưu vào thư mục thumbnail
    //     if ($request->hasFile('main_image')) {
    //         // Tạo tên tệp duy nhất cho hình ảnh
    //         $filename = time() . '_' . $request->file('main_image')->getClientOriginalName();

    //         // Lưu hình ảnh vào thư mục public/thumbnail
    //         $path = $request->file('main_image')->storeAs('thumbnail', $filename, 'public');

    //         // Cập nhật lại đường dẫn ảnh trong cơ sở dữ liệu
    //         $product->update([
    //             'main_image' => $path,
    //         ]);
    //     }

    //     // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
    //     return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    // }

    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:category,category_id',
            'brand_id' => 'required|integer|exists:brand,brand_id', // Validate brand ID
            'status' => 'required|in:active,inactive',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:102400',
        ]);
    
        // Step 1: Create product without the image initially
        $product = Products::create([
            'pname' => $request->name,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id, // Phải đảm bảo có dòng này
            'status' => $request->status,
            'main_image' => null,
        ]);
        
    
        // Step 2: If there's an image, process and store it
        if ($request->hasFile('main_image')) {
            // Generate a unique file name for the image
            $filename = time() . '_' . $request->file('main_image')->getClientOriginalName();
    
            // Save the image in the "public/thumbnail" directory
            $path = $request->file('main_image')->storeAs('thumbnail', $filename, 'public');
    
            // Update the product with the image path
            $product->update([
                'main_image' => $path,
            ]);
        }


        // dd($request->all());

        // Redirect to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    }
    
    // public function edit($product_id)
    // {
    //     $products = Products::findOrFail($product_id);
    //     return view('admin.product.edit', compact('products'));
    // }

    // public function update(Request $request, $product_id)
    // {
    //     // Lấy sản phẩm hiện tại từ cơ sở dữ liệu
    //     $product = Products::findOrFail($product_id);
    
    //     // Xác thực dữ liệu đầu vào
    //     $request->validate([
    //         'name' => 'nullable|string|max:255', // Trường này có thể để trống
    //         'category_id' => 'nullable|integer|exists:category,category_id',
    //         'status' => 'nullable|in:active,inactive',
    //         'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //     ]);
    
    //     // Thực hiện cập nhật dữ liệu, đảm bảo giữ giá trị cũ nếu trường trống
    //     $pname = $request->name ?? $product->pname; // Giữ giá trị cũ nếu không nhập
    //     $category_id = $request->category_id ?? $product->category_id;
    //     $status = $request->status ?? $product->status;
    //     $main_image = $this->handleImageUpload($request, $product->main_image); // Xử lý ảnh
    
    //     // Đảm bảo cột 'pname' không được phép null
    //     if (!$pname) {
    //         return redirect()->back()->withErrors(['name' => 'Tên sản phẩm không được để trống.']);
    //     }
    
    //     // Cập nhật sản phẩm
    //     $product->update([
    //         'pname' => $pname,
    //         'category_id' => $category_id,

    //         'status' => $status,
    //         'main_image' => $main_image,
    //     ]);
    
    //     return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    // }
    
    
    public function edit($product_id)
    {
        $products = Products::findOrFail($product_id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.edit', compact('products', 'categories', 'brands'));
    }

    public function update(Request $request, $product_id)
    {
        $product = Products::findOrFail($product_id);

        // Validate input data
        $request->validate([
            'name' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:category,category_id',
            'brand_id' => 'nullable|exists:brand,brand_id',
            'status' => 'nullable|in:active,inactive',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Keep old values if new ones are not provided
        $updatedData = [
            'pname' => $request->name ?? $product->pname,
            'category_id' => $request->category_id ?? $product->category_id,
            'brand_id' => $request->brand_id ?? $product->brand_id,
            'status' => $request->status ?? $product->status,
        ];

        // Update image if provided
        if ($request->hasFile('main_image')) {
            $filename = time() . '_' . $request->file('main_image')->getClientOriginalName();
            $updatedData['main_image'] = $request->file('main_image')->storeAs('images', $filename, 'public');
        }

        $product->update($updatedData);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

 

    
    

    private function handleImageUpload(Request $request, $currentImagePath)
    {
        if ($request->hasFile('main_image')) {
            return $request->file('main_image')->store('images', 'public');
        }
        return $currentImagePath; // Trả về ảnh hiện tại nếu không tải lên ảnh mới
    }
    



    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->productDetails()->delete();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa.');
    }
}
