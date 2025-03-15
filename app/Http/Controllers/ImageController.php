<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // Hiển thị form tạo hình ảnh mới cho sản phẩm
    public function create(ProductDetail $productDetail)
    {
        return view('admin.product.createimage', compact('productDetail'));
    }

    // Lưu hình ảnh vào cơ sở dữ liệu
    public function store(Request $request, ProductDetail $productDetail)
    {
        $request->validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_main' => 'nullable|boolean',
        ]);

        // Xử lý upload file
        $imagePath = $request->file('image_url')->store('images', 'public');

        // Lưu thông tin hình ảnh vào cơ sở dữ liệu
        Image::create([
            'product_code' => $productDetail->product_code,
            'image_url' => $imagePath,
            'is_main' => $request->has('is_main') ? $request->is_main : false,
        ]);

        return redirect()->route('products.show', $productDetail->product_id)
            ->with('success', 'Hình ảnh đã được tải lên thành công!');
    }

    // Hiển thị form chỉnh sửa hình ảnh của sản phẩm
    public function edit(Image $image)
    {
        return view('admin.product.editimage', compact('image'));
    }

    // Cập nhật thông tin hình ảnh
    public function update(Request $request, Image $image)
    {
        $request->validate([
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_main' => 'nullable|boolean',
        ]);

        // Nếu có hình ảnh mới, xử lý upload
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
            $image->image_url = $imagePath;
        }

        // Cập nhật trạng thái is_main
        $image->is_main = $request->has('is_main') ? $request->is_main : false;

        $image->save();

        return redirect()->route('products.show', $image->productDetail->product_id)
            ->with('success', 'Thông tin hình ảnh đã được cập nhật!');
    }

    // Xóa hình ảnh của sản phẩm
    public function destroy(Image $image)
    {
        // Xóa hình ảnh từ storage
        \Storage::delete('public/' . $image->image_url);

        // Xóa hình ảnh khỏi cơ sở dữ liệu
        $image->delete();

        return redirect()->route('products.show', $image->productDetail->product_id)
            ->with('success', 'Hình ảnh đã bị xóa!');
    }
}
