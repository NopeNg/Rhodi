<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model {
    use HasFactory;

    protected $table = 'products'; // Tên bảng
    protected $primaryKey = 'product_id'; // Khóa chính
    public $timestamps = false; // Sử dụng timestamps (có thể thay đổi thành false nếu không cần)

    // Các cột có thể được gán hàng loạt
    protected $fillable = [
        'product_code', // Không cần đưa 'product_id' vào đây nếu nó tự động tăng
        'name',
        'category_id',
        'price',
        'status',
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