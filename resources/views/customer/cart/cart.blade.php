@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Giỏ Hàng</h1>

    @if($cartItems->isEmpty())
        <p>Giỏ hàng của bạn đang trống.</p>
    @else
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Sản Phẩm</th>
                    <th class="py-2 px-4 border-b">Số Lượng</th>
                    <th class="py-2 px-4 border-b">Giá</th>
                    <th class="py-2 px-4 border-b">Tổng</th>
                    <th class="py-2 px-4 border-b">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="qty" value="{{ $item->qty }}" min="1" class="w-16 text-center">
                                <button type="submit" class="btn btn-sm btn-primary">Cập Nhật</button>
                            </form>
                        </td>
                        <td class="py-2 px-4 border-b">{{ number_format($item->price, 2) }} VNĐ</td>
                        <td class="py-2 px-4 border-b">{{ number_format($item->subtotal, 2) }} VNĐ</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <h2 class="text-xl font-bold">Tổng Giá Trị: {{ number_format($total, 2) }} VNĐ</h2>
            <a href="{{ route('checkout') }}" class="btn btn-primary mt-4">Thanh Toán</a>
        </div>
    @endif
</div>
@endsection