<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Products::all(); // Lấy tất cả sản phẩm
        return view('admin.product.product', compact('products')); // Trả về view với danh sách sản phẩm
    }

    public function create()
    {
        $categories = Category::all(); // Lấy danh sách danh mục để đưa vào dropdown
        return view('admin.product.create', compact('categories'));
      
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('admin.product.edit', compact('product')); // Đảm bảo rằng bạn có view cho chỉnh sửa sản phẩm
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_code' => 'required',
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);

        $product = Products::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        // Tìm sản phẩm
        $product = Products::findOrFail($id);

        // Xóa tất cả các chi tiết sản phẩm liên quan
        $product->productDetails()->delete(); // Xóa các chi tiết sản phẩm

        // Xóa sản phẩm
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function store(Request $request) {
        // Xác thực dữ liệu
        $request->validate([
            'product_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|in:active,inactive',
        ]);
    
        // Tạo sản phẩm mới
        Products::create($request->all());
    
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    }
}