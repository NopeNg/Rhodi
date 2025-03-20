<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Services\FormatService;
use Illuminate\Http\Request;
use App\Models\ProductDetail;

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

    public function store(Request $request)
    {
        // 1. Xác thực dữ liệu
        $request->validate([
            'product_name' => 'required|string|max:255', // Thêm trường product_name
            'description' => 'required|string',
            'size' => 'required|string',
            'color' => 'required|string',
            'cost' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'product_id' => 'required|exists:products,product_id',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048', // validate file ảnh
        ]);

        // 2. Tạo mã sản phẩm
        $productCode = $this->generateProductCode($request->product_name, $request->brand, $request->size, $request->color);

        // 3. Tạo chi tiết sản phẩm
        ProductDetail::create([
            'product_code' => $productCode,
            'description' => $request->description,
            'size' => $request->size,
            'color' => $request->color,
            'cost' => $request->cost,
            'selling_price' => $request->selling_price,
            'stock_quantity' => $request->stock_quantity,
            'product_id' => $request->product_id,
        ]);

        // 4. Lưu ảnh vào storage theo product_code
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $imageFile) {
                $folder = 'images/' . $productCode; // Folder: storage/app/public/images/{product_code}
                $fileName = uniqid() . '.' . $imageFile->getClientOriginalExtension();

                // Lưu file vào storage/app/public/images/{product_code}/filename.jpg
                $path = $imageFile->storeAs($folder, $fileName, 'public');

                // Ghi đường dẫn vào bảng image
                DB::table('image')->insert([
                    'product_code' => $productCode,
                    'image_url' => $path, // Lưu: images/ABC001/xyz.jpg
                    'is_main' => $index === 0 ? 1 : 0,
                ]);
            }
        }

        return redirect()->route('product.details.index', $request->product_id)
            ->with('success', 'Chi tiết sản phẩm và ảnh đã được thêm thành công.');
    }

    public function __construct(FormatService $format)
    {
        $this->format = $format;
    }


    /**
     * Hiển thị danh sách chi tiết sản phẩm.
     *
     * @return \Illuminate\View\View
     */
    public function index($product_id)
    {
        // Lấy sản phẩm
        $product = Products::findOrFail($product_id);
    
        // Lấy bản ghi mới nhất theo product_code dựa trên imported_at
        $latestProductDetails = DB::table('product_detail as pd1')
            ->join('image', 'pd1.product_code', '=', 'image.product_code')
            ->join('products', 'pd1.product_id', '=', 'products.product_id')
            ->where('pd1.product_id', $product_id)
            ->whereRaw('pd1.imported_at = (
                SELECT MAX(pd2.imported_at)
                FROM product_detail as pd2
                WHERE pd2.product_code = pd1.product_code
            )')
            ->select('pd1.*', 'image.image_url')
            ->get();
    
        return view('admin.product.productdetail', compact('product', 'latestProductDetails', 'product_id'));
    }
    

    /**
     * Hiển thị chi tiết của một sản phẩm.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Tìm sản phẩm theo ID
        $product = ProductDetail::with('products', 'image')->findOrFail($id);

        // Trả về view với chi tiết sản phẩm
        return view('product_details.show', compact('product'));
    }



    private function generateProductCode($productName, $brand, $size, $color)
    {
        // Chuyển tên sản phẩm thành không dấu, viết thường và không có khoảng trắng
        $productNameSlug = Str::slug($productName, ''); // Sử dụng Str::slug để loại bỏ dấu và khoảng trắng
    
        // Tạo mã sản phẩm theo công thức
        $productCode = strtolower($productNameSlug) . $brand . $size . $color;
    
        return $productCode;
    }
}
