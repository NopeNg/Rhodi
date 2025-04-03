<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Kế thừa từ Auth User
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable; // Gửi thông báo khi cần

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'customer'; // Tên bảng
    protected $primaryKey = 'customer_id'; // Khóa chính của bảng
    public $timestamps = false; // Vô hiệu hóa timestamps nếu không dùng

    protected $fillable = [
        'full_name', 'email', 'phone', 'address', 'password', 'created_at',
    ];

    protected $hidden = [
        'password', 'remember_token', // Ẩn mật khẩu và token
    ];

    // Quan hệ với bảng cart
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'customer_id');
    }

    // Quan hệ với bảng shipping_address
    public function shippingAddresses(): HasMany
    {
        return $this->hasMany(ShippingAddress::class, 'customer_id');
    }

    // Quan hệ với bảng orders
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    /**
     * Trả về tên khóa chính để xác thực.
     */
    public function getAuthIdentifierName()
    {
        return 'customer_id';
    }

    /**
     * Trả về giá trị của khóa chính để xác thực.
     */
    public function getAuthIdentifier()
    {
        return $this->customer_id;
    }

    /**
     * Trả về mật khẩu của người dùng để xác thực.
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
}
