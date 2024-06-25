<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    use HasFactory;
    protected $table = 'user';
    public $timestamps = FALSE;
    protected $fillable = [
        'name','email','password','address','dateOfBirth','gender','image'
    ] ;
    
}
