<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'code',
        'description',
    ];
}
