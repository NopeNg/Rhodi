<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model {
    use HasFactory;

    protected $table = 'products'; // Tên bảng
    protected $primaryKey = 'product_id'; // Khóa chính
    public $timestamps = false; // Sử dụng timestamps

    // Các cột có thể được gán hàng loạt
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'status',
        'main_image',
        'total_quantity'
    ];

    // Các trường cần ẩn khi chuyển đổi thành mảng hoặc JSON
    protected $hidden = [
        // 'password', // Nếu có trường nhạy cảm
    ];

    // Các trường cần chuyển đổi kiểu dữ liệu
    protected $casts = [
        'price' => 'decimal:2',
        'total_quantity' => 'integer',
    ];

    // Quan hệ với model Category
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    // Quan hệ với model ProductDetail
    public function productDetails() {
        return $this->hasMany(ProductDetail::class, 'product_id', 'product_id');
    }
}