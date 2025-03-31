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
        <div class="u-clearfix u-sheet u-sheet-1">
            <!--products--><!--products_options_json--><!--{"type":"Recent","source":"","tags":"","count":""}--><!--/products_options_json-->
            <div class="u-expanded-width u-products u-products-1">
                <div class="u-list-control"></div>
                <div class="u-repeater u-repeater-1">

@foreach ( $prdt as $prdts )
<div
                        class="u-align-left u-container-align-left-lg u-container-align-left-md u-container-align-left-sm u-container-align-left-xs u-container-style u-products-item u-repeater-item u-repeater-item-1">
                        <div class="u-container-layout u-similar-container u-container-layout-1"><!--product_image-->
                            <img src="https://attackshark.com/cdn/shop/files/3_671aefd1-4890-4597-ac16-20eea7da5593.png?v=1716263691&width=800"
                                alt=""
                                class="u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-image u-image-contain u-image-default u-product-control u-image-1"
                                data-image-width="1200"
                                data-image-height="1200"><!--/product_image--><!--product_title-->
                            <h4
                                class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-product-control u-text u-text-1">
                                <a class=" a u-product-title-link" href="#"><!--product_title_content--> {{ $prdts ->name }} <!--/product_title_content--></a>
                            </h4><!--/product_title--><!--product_content-->
                            <div
                                class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-product-control u-product-desc u-text u-text-2">
                                <!--product_content_content-->{{ $prdts->description}}<!--/product_content_content-->
                                <p class="text-primary"><strong>Số lượng còn lại: </strong> {{ $totalStock }}</p>
                            </div>
                            <!--/product_content--><!--product_price-->
                            <div
                                class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-product-control u-product-price u-product-price-1">
                                <div class="u-price-wrapper u-spacing-10"><!--product_old_price-->
                                    <div class="u-hide-price u-old-price">
                                        <!--product_old_price_content-->$20.00<!--/product_old_price_content-->
                                    </div>
                                    <!--/product_old_price--><!--product_regular_price-->
                                    <div class="u-price u-text-palette-1-base"
                                        style="font-size: 1.5rem; font-weight: 700;">
                                        <!--product_regular_price_content-->$17.00<!--/product_regular_price_content-->
                                    </div><!--/product_regular_price-->
                                </div>
                            </div>
                            <!--/product_price--><!--product_button--><!--options_json--><!--{"clickType":"add-to-cart","content":"Add to cart"}--><!--/options_json-->
                            <a href="#"
                                class="u-active-grey-75 u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-border-none u-btn u-button-style u-hover-grey-75 u-palette-1-base u-product-control u-btn-1 u-dialog-link u-payment-button"><!--product_button_content-->Add
                                to cart<!--/product_button_content--></a><!--/product_button-->
                        </div>
                    </div><!--/product_item--><!--product_item-->
@endforeach
                  
                </div>
                <div class="u-list-control"></div>
            </div><!--/products-->
        </div>
    </section>
</body>
<!-- Mirrored from website85995.nicepage.io/Page-2.html?version=4260892f-b78b-4826-8d31-c274d24d46cc by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 Mar 2025 18:31:06 GMT -->

</html>