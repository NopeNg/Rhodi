<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Services\FormatService;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;


class ProductDetailController extends Controller
{


    protected $format;
    public function create($product_id)
    {
        // Lấy thông tin sản phẩm để hiển thị trong form
        $product = Products::findOrFail($product_id);
        $productCode = $this->generateProductCode($product->name, $product->brand, '', '');

        return view('admin.product.addproductdetail', compact('product'));
    }

    // public function store(Request $request)
    // {
    //     // Gỡ lỗi: Kiểm tra tất cả dữ liệu yêu cầu
    //     dd($request->all());

    //     // 1. Xác thực dữ liệu
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'size' => 'required|string',
    //         'brand' => 'required|string|max:255',
    //         'color' => 'required|string',
    //         'cost' => 'required|numeric',
    //         'selling_price' => 'required|numeric',
    //         'stock_quantity' => 'required|integer',
    //         'product_code' => 'required|string|max:255', // Thêm xác thực cho product_code
    //         'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
    //     ]);

    //     // 2. Tạo mã sản phẩm
    //     $productCode = $request->product_code; // Sử dụng product_code từ yêu cầu

    //     // 3. Tạo chi tiết sản phẩm
    //     ProductDetail::create([
    //         'product_code' => $productCode,
    //         'description' => $request->description,
    //         'size' => $request->size,
    //         'color' => $request->color,
    //         'cost' => $request->cost,
    //         'selling_price' => $request->selling_price,
    //         'stock_quantity' => $request->stock_quantity,
    //     ]);

    //     // 4. Lưu ảnh vào storage theo product_code
    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $index => $imageFile) {
    //             $folder = 'images/' . $productCode; // Thư mục: storage/app/public/images/{product_code}
    //             $fileName = uniqid() . '.' . $imageFile->getClientOriginalExtension();

    //             // Lưu file vào storage/app/public/images/{product_code}
    //             $imageFile->storeAs($folder, $fileName);
    //         }
    //     }

    //     // 5. Chuyển hướng về trang chi tiết sản phẩm
    //     return redirect()->route('product.details.index', ['product_id' => $product->product_id])->with('success', 'Chi tiết sản phẩm đã được thêm thành công.');
    // }

    public function __construct(FormatService $format)
    {
        $this->format = $format;
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,product_id', // Sửa lại cột 'id'
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'size' => 'required|string',
            'brand' => 'required|string|max:255',
            'color' => 'required|string',
            'cost' => 'required|numeric',
            'stock_quantity' => 'required|integer|min:0', // Thêm xác thực cho stock_quantity
            'product_code' => 'nullable|string|max:255', // Cho phép nullable, nếu chưa có sẽ tạo mới
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Tạo mã sản phẩm nếu chưa có
        $productCode = $validatedData['product_code'] ?? $this->format->generateProductCode(
            $validatedData['name'],
            $validatedData['brand'],
            $validatedData['size'],
            $validatedData['color']
        );

        // Lưu vào bảng product_detail
        $productDetail = ProductDetail::create([
            'product_id' => $validatedData['product_id'],
            'product_code' => $productCode,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'brand' => $validatedData['brand'],
            'size' => $validatedData['size'],
            'color' => $validatedData['color'],
            'cost' => $validatedData['cost'],
            'stock_quantity' => $validatedData['stock_quantity'], // Thêm stock_quantity vào đây
        ]);

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $folder = 'images/' . $productCode;
                $fileName = uniqid() . '.' . $imageFile->getClientOriginalExtension();

                // Lưu vào storage/app/public/images/{product_code}
                $imagePath = $imageFile->storeAs($folder, $fileName, 'public');

                // Lưu vào bảng images
                Image::create([
                    'product_code' => $productCode,
                    'image_url' => Storage::url($imagePath),
                ]);
            }
        }

        // Chuyển hướng với thông báo thành công
        return redirect()->route('product.details.index', ['product_id' => $validatedData['product_id']])
            ->with('success', 'Chi tiết sản phẩm đã được thêm thành công.');
    }


    /**
     * Hiển thị danh sách chi tiết sản phẩm.
     *
     * @return \Illuminate\View\View
     */


    public function index($product_id)
    {
        $latestProductDetails = DB::table('product_detail as pd1')
            ->leftJoin('image', 'pd1.product_code', '=', 'image.product_code') // Sử dụng LEFT JOIN
            ->join('products', 'pd1.product_id', '=', 'products.product_id')
            ->where('pd1.product_id', $product_id) // Chỉ lấy bản ghi cho sản phẩm cụ thể
            ->where('pd1.stock_quantity', '>', 0) // Chỉ lấy các bản ghi có stock_quantity > 0
            ->select('pd1.*', 'image.image_url')
            ->get();
        return view('admin.product.productdetail', compact('latestProductDetails', 'product_id'));
    }


    // /**
    //  * Hiển thị chi tiết của một sản phẩm.
    //  *
    //  * @param int $id
    //  * @return \Illuminate\View\View
    //  */



    private function generateProductCode($productName, $brand, $size, $color)
    {
        // Chuyển tên sản phẩm thành không dấu, viết thường và không có khoảng trắng
        $productNameSlug = Str::slug($productName, ''); // Sử dụng Str::slug để loại bỏ dấu và khoảng trắng

        // Tạo mã sản phẩm theo công thức
        $productCode = strtolower($productNameSlug) . $brand . $size . $color;

        return $productCode;
    }
}
