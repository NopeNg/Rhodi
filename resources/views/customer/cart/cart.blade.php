@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Giỏ hàng</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (empty($cart))
        <p>Giỏ hàng của bạn đang trống.</p>
    @else
    <h1>Giỏ hàng của bạn</h1>
<table>
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ number_format($item->selling_price, 0, ',', '.') }} VNĐ</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->selling_price * $item->quantity, 0, ',', '.') }} VNĐ</td>
                <td>
                    <form action="{{ route('cart.remove', ['productCode' => $item->product_code]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<p><strong>Tổng cộng: {{ number_format($totalAmount, 0, ',', '.') }} VNĐ</strong></p>

<form action="{{ route('cart.checkout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">Mua hàng</button>
</form>

</div>
@endsection
