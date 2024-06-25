<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;
    protected $table="product";
    public $timestamps = false;
    protected $fillable=[
        'tensp','id_danhmuc','soluong','gia','thongtin','img'
    ];
}
