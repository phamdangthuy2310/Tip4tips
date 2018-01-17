<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
    protected $table = 'regions';
    protected $fillable = [
        'id',
        'name'
    ];

    public static function getNameByID($id){
        $name = Region::where('id', $id)
            ->select('*')->first();
        return $name;
    }
}
