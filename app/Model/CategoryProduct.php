<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    protected $table = 'categoryproducts';
    protected $fillable = [
        'name',
        'description'
    ];
}
