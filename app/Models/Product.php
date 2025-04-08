<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'price', 'description', 'image', 'view', 'category_id'];
    protected $dates = ['deleted_at'];  // Laravel tự động nhận diện cột deleted_at
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $table="products";
}
