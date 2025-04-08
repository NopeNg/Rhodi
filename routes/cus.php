<?php
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CusProController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;


Route::middleware(['auth:customer'])->prefix('customer')->name('customer.')->group(function () {
    // Hiển thị trang dashboard cho khách hàng
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');
    //hiển thị trang sản phẩm theo danh mục
    Route::get('/category/{category_id}', [CusProController::class, 'showc'])->name('category.show');
Route::get('/products/category/{category_id}', [CusProController::class, 'showProductsByCategory'])->name('products.byCategory');
Route::get('/categories', [CusProController::class, 'getCategories'])->name('categories.index');
Route::get('/category/{id}', action: [CusProController::class, 'showProductsByCategory'])->name('category.products');
// Route::get('/api/category-details/{category_id}', function ($category_id) {
//     $details = Category::where('category_id', $category_id)->get(['category_detail_name']);
//     return response()->json($details);
// });

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/update/{productCode}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{productCode}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

});


//Hiển thị sản phẩm theo thể loạiloại
Route::middleware(['auth:customer'])->group(function () {
    Route::get('/category/{category_id}', [CusProController::class, 'showc'])->name('category.show');
Route::get('/products/category/{category_id}', [CusProController::class, 'showProductsByCategory'])->name('products.byCategory');
Route::get('/categories', [CusProController::class, 'getCategories'])->name('categories.index');
Route::get('/category/{id}', action: [CusProController::class, 'showProductsByCategory'])->name('category.products');
// Route::get('/api/category-details/{category_id}', function ($category_id) {
//     $details = Category::where('category_id', $category_id)->get(['category_detail_name']);
//     return response()->json($details);
// });

});


// Route cho trang giỏ hàng
Route::middleware(['auth:customer'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/update/{productCode}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove/{productCode}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    

});