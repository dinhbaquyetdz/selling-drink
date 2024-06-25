<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhangModel extends Model
{
    use HasFactory;
    protected $table = 'donhang';
    public $timestamps = false;
    protected $fillable=[
        'id_khachhang','id_sp','soluong','gia','phone','address','ngaydat','trangthai','thanhtoan'
    ];
}
