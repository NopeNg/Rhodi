<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model {
    use HasFactory;

    protected $table = 'shipping_address';
    protected $primaryKey = 'address_id';
    public $timestamps = false;

    protected $fillable = ['customer_id', 'full_name', 'phone', 'address_line', 'city', 'district', 'postal_code', 'is_default'];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}
