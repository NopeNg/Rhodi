<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Category extends Model {
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    protected $fillable = ['category_id','category_name', 'category_detail_name'];

    public function products() {
        return $this->hasMany(Products::class, 'category_id', 'category_id');
    }

public function index()
{
//querry builder để lấy dữ liệu từ bảng category trong database
    $categories =   DB::table('category')
    // ->select('category_id', 'category_name', 'category_detail_name')
    ->get();
//trả dữ liệu vừd lấy được
return view('admin.categories.index',
 ['categories' => $categories]);

}
}
