<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;

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
        return view('product.create', compact('product'));
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'product_code' => 'required|string|max:255',
            'description' => 'required|string',
            'size' => 'required|string',
            'color' => 'required|string',
            'cost' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            // Thêm các trường khác nếu cần
        ]);

        // Tạo chi tiết sản phẩm mới
        ProductDetail::create($request->all());

        return redirect()->route('product.details', $request->product_id)
            ->with('success', 'Chi tiết sản phẩm đã được thêm thành công.');
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
        // Lấy sản phẩm, nếu không tồn tại sẽ trả về lỗi 404
        $product = Products::findOrFail($product_id);

        // Lấy danh sách chi tiết sản phẩm liên quan, có join bảng products để lấy thêm thông tin
        $productDetails = DB::table('product_detail')
            ->join('image', 'product_detail.product_code', '=', 'image.product_code')
            ->join('products', 'product_detail.product_id', '=', 'products.product_id')
            ->where('product_detail.product_id', $product_id)
            ->select(
                'product_detail.*',
                'image.image_url',

            )
            ->get();
        //format 


        $productDetails->transform(function ($detail) {
            $detail->selling_price = $this->format->currencyVN($detail->selling_price);
            return $detail;
        });

        // Trả về view với dữ liệu
        return view('admin.product.productdetail', compact('product', 'productDetails'));
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
}
