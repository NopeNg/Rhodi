<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
    use HasFactory;

    protected $table = 'employee';
    protected $primaryKey = 'employee_id';
    public $timestamps = false;

    protected $fillable = ['code', 'full_name', 'email', 'phone', 'address', 'birth', 'level', 'hire_date', 'password'];

    public function role() {
        return $this->belongsTo(Role::class, 'level', 'level');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'employee_id', 'employee_id');
    }
}

