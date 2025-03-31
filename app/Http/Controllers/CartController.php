<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ProductDetail;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $customerId = auth()->id(); // Lấy ID khách hàng đã đăng nhập

        // Lấy các sản phẩm trong giỏ hàng của khách hàng
        $cartItems = DB::table('cart')
            ->join('product_detail', 'cart.product_code', '=', 'product_detail.product_code')
            ->where('cart.customer_id', $customerId)
            ->select(
                'cart.*',
                'product_detail.dname as product_name',
                'product_detail.selling_price'
            )
            ->get();

        // Tính tổng tiền
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->selling_price * $item->quantity;
        });

        return view('cart', [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
        ]);
        if (auth()->check()) {
            // Người dùng đã đăng nhập
            $user = auth()->user();
            dd($user);
        } else {
            // Người dùng chưa đăng nhập
            dd('Chưa đăng nhập');
        }
        
    }



    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request)
    {
        $customerId = auth()->id(); // Lấy ID khách hàng đã đăng nhập
        $productCode = $request->input('product_code');
        $quantity = $request->input('quantity', 1);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        $existingCartItem = DB::table('cart')
            ->where('customer_id', $customerId)
            ->where('product_code', $productCode)
            ->first();

        if ($existingCartItem) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            DB::table('cart')
                ->where('customer_id', $customerId)
                ->where('product_code', $productCode)
                ->update([
                    'quantity' => $existingCartItem->quantity + $quantity,
                    'updated_at' => now(),
                ]);
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            DB::table('cart')->insert([
                'customer_id' => $customerId,
                'product_code' => $productCode,
                'quantity' => $quantity,
                'added_at' => now(),
                'updated_at' => now(),
            ]);
        }
        dd(auth()->user());

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }



    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($productCode)
    {
        $customerId = auth()->id(); // Lấy ID khách hàng đã đăng nhập

        DB::table('cart')
            ->where('customer_id', $customerId)
            ->where('product_code', $productCode)
            ->delete();

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }


    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateCart(Request $request)
    {
        $cart = Session::get('cart', []);

        foreach ($request->product_codes as $key => $product_code) {
            if (isset($cart[$product_code])) {
                $cart[$product_code]['quantity'] = $request->quantities[$key];
            }
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được cập nhật.');
    }

    public function checkout(Request $request)
    {
        $customerId = auth()->id(); // Lấy ID khách hàng hiện tại

        // Lấy tất cả sản phẩm trong giỏ hàng
        $cartItems = DB::table('cart')->where('customer_id', $customerId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->withErrors('Giỏ hàng của bạn trống.');
        }

        DB::beginTransaction();
        try {
            // Tạo đơn hàng trong bảng orders
            $orderId = DB::table('orders')->insertGetId([
                'customer_id' => $customerId,
                'order_date' => now(),
                'total_amount' => $cartItems->sum(function ($item) {
                    return $item->quantity * $item->unit_price;
                }),
                'status' => 'pending',
                'updated_at' => now(),
            ]);

            // Thêm chi tiết sản phẩm vào bảng order_detail
            foreach ($cartItems as $item) {
                DB::table('order_detail')->insert([
                    'order_id' => $orderId,
                    'product_code' => $item->product_code,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                    'subtotal' => $item->quantity * $item->unit_price,
                ]);
            }

            // Xóa sản phẩm khỏi giỏ hàng sau khi chuyển đổi
            DB::table('cart')->where('customer_id', $customerId)->delete();

            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được tạo thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Lỗi khi xử lý thanh toán: ' . $e->getMessage());
            return redirect()->route('cart.index')->withErrors('Có lỗi xảy ra khi thanh toán.');
        }
    }

}