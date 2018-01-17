<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GiftCategory extends Model
{
    //
    protected $table = 'giftcategories';
    protected $fillable = [
        'name',
        'code',
        'description',
    ];
}
