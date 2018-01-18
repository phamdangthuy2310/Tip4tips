<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'thumbnail',
        'quality',
        'category_id'
    ];

    public static function getAllProduct(){
        $product = Product::all();
        return $product;
    }
}
