<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    public $timestamps = false;

    protected $fillable = ['full_name', 'email', 'phone', 'address', 'password'];

    public function orders() {
        return $this->hasMany(Order::class, 'customer_id', 'customer_id');
    }

    public function shippingAddresses() {
        return $this->hasMany(ShippingAddress::class, 'customer_id', 'customer_id');
    }
}
