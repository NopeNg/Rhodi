<!doctype html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Page 2</title>

    @vite([
        'resources/css/wel.css',
        'resources/css/app.css',
        'resources/css/customer/show.css',
        'resources/css/customer/show2.css',
        'resources/css/customer/show3.css',
    ])
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Page 2">
    <meta property="og:type" content="website">
</head>

<body class="u-body u-xl-mode" data-lang="en">
    <x-weltopbar />
    <section class="u-clearfix u-section-1" id="sec-ea0f">
    <div class="u-expanded-width u-products u-products-1">
    <div class="u-list-control"></div>
    <div class="u-repeater u-repeater-1">
        @foreach ($prdt as $product)
            <div>
                <h3>{{ $product->name }}</h3>
                <img src="{{ asset('storage/' . $product->main_image) }}" alt="Hình ảnh sản phẩm">
                <p>Giá: 
                    {{ $prices[$product->product_id]->min_price }} 
                    @if ($prices[$product->product_id]->max_price)
                        - {{ $prices[$product->product_id]->max_price }}
                    @endif
                </p>
                <!-- Hiển thị tổng số lượng sản phẩm còn lại -->
                <p>Tổng số lượng còn lại: 
                    @if ($productStocks->contains('product_id', $product->product_id))
                        {{ $productStocks->firstWhere('product_id', $product->product_id)->total_stock }}
                    @else
                        Không có thông tin
                    @endif
                </p>

                <!-- Nút thêm vào giỏ hàng -->
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <input type="number" name="quantity" value="1" min="1" required>
                    <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

    </section>
</body>
<!-- Mirrored from website85995.nicepage.io/Page-2.html?version=4260892f-b78b-4826-8d31-c274d24d46cc by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 Mar 2025 18:31:06 GMT -->

</html>