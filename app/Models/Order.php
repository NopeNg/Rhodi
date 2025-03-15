<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false;

    protected $fillable = ['customer_id', 'employee_id', 'order_date', 'total_amount', 'payment_method_id', 'status'];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'payment_method_id');
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
}

