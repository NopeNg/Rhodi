<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Kế thừa lớp Auth User
use Illuminate\Notifications\Notifiable; // Để gửi thông báo nếu cần
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable {
    use HasFactory, Notifiable;

    protected $table = 'employee'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'employee_id'; // Khóa chính của bảng
    public $timestamps = false; // Tắt tự động timestamps nếu không cần

    protected $fillable = [
        'code', 'full_name', 'email', 'phone', 'address', 'birth', 'level', 'hire_date', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token', // Ẩn mật khẩu và token trong kết quả query
    ];

    // Quan hệ với bảng role
    public function role() {
        return $this->belongsTo(Role::class, 'level', 'level');
    }

    // Quan hệ với bảng orders
    public function orders() {
        return $this->hasMany(Order::class, 'employee_id', 'employee_id');
    }

    /**
     * Trả về khóa chính để xác thực.
     */
    public function getAuthIdentifierName() {
        return 'employee_id';
    }

    /**
     * Trả về giá trị khóa chính của đối tượng.
     */
    public function getAuthIdentifier() {
        return $this->employee_id;
    }

    /**
     * Trả về mật khẩu để xác thực.
     */
    public function getAuthPassword() {
        return $this->password;
    }
}
