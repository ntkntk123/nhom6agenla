<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use HasFactory, SoftDeletes;


    protected $fillable = ['name'];

    // Nếu muốn, có thể thêm cột ngày xóa
    protected $dates = ['deleted_at'];
    protected $table="categories";
}
