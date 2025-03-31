<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand'; // Tên bảng trong database
    protected $primaryKey = 'brand_id'; // Khóa chính
    protected $fillable = ['brand_name', 'description']; // Các cột được phép thêm/sửa

    // Quan hệ One-to-Many: Một thương hiệu có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Products::class, 'brand_id', 'brand_id');
    }
    
}
