<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleType extends Model
{
    //
    protected $table = 'roletypes';
    protected $fillable = [
        'name',
        'code'
    ];

    public static function getNameByID($id){
        return RoleType::where('id', $id)->select('*')->first();
    }
}
