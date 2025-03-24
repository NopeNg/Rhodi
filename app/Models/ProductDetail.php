<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model {
    use HasFactory;

    protected $table = 'product_detail';
    protected $primaryKey = 'product_detail_id';
    public $timestamps = false;


    protected $fillable = ['product_id', 'product_code', 'name', 'description', 'brand', 'stock_quantity', 'size', 'color', 'cost', 'profit_margin', 'discount_rate', 'selling_price', 'status', 'imported_at'];

    public function products() {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }

    public function images() {
        return $this->hasMany(Image::class, 'product_code', 'product_code');
    }
}

