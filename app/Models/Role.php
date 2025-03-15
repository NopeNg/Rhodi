<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'level';
    public $timestamps = false;

    protected $fillable = ['role_name'];

    public function employees() {
        return $this->hasMany(Employee::class, 'level', 'level');
    }
}
