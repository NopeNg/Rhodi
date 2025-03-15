<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    use HasFactory;

    protected $table = 'image';
    protected $primaryKey = 'image_id';
    public $timestamps = false;

    protected $fillable = ['product_code', 'image_url', 'is_main'];

    public function productDetail() {
        return $this->belongsTo(ProductDetail::class, 'product_code', 'product_code');
    }
}

