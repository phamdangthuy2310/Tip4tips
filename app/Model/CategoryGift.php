<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryGift extends Model
{
    //
    protected $table = 'categorygifts';
    protected $fillable = [
        'name',
        'description'
    ];
}
