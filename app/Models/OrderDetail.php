<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model {
    use HasFactory;

    protected $table = 'order_detail';
    protected $primaryKey = 'order_detail_id';
    public $timestamps = false;

    protected $fillable = ['order_id', 'product_code', 'quantity', 'unit_price', 'subtotal'];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function productDetail() {
        return $this->belongsTo(ProductDetail::class, 'product_code', 'product_code');
    }
}
