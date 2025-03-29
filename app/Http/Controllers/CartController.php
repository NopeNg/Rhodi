<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart; // Giả sử bạn đang sử dụng một package giỏ hàng như "Gloudemans\Shoppingcart"

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content(); // Lấy nội dung giỏ hàng
        $total = Cart::total(); // Tính tổng giá trị giỏ hàng

        return view('customer.cart.cart.blade.php', compact('cartItems', 'total'));
    }

    public function update(Request $request, $rowId)
    {
        $qty = $request->input('qty');
        Cart::update($rowId, $qty);
        return redirect()->route('cart.index')->with('success', 'Cập nhật giỏ hàng thành công!');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index')->with('success', 'Xóa sản phẩm khỏi giỏ hàng thành công!');
    }
}