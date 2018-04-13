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

    public static function getAllGifts(){
        $gifts = Gift::all();
        return $gifts;
    }
    public static function getGiftByID($id){
        return Gift::find($id);
    }
}
