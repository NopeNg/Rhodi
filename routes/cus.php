<?php
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CusProController;
use App\Models\Category;

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

});
