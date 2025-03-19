<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\ProductDetail;

class ProductDetailController extends Controller
{
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