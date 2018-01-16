<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    //
    protected $table = 'gifts';
    protected $fillable = [
        'name',
        'description',
        'point',
        'category_id',
        'thumbnail'
    ];

    public static function showCatygoryType($name){
        switch ($name){
            case 0:
                $name = 'Products';
                break;
            case 1:
                $name = 'Gifts';
        }
        return $name;
    }
}
