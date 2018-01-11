<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'permissions';
    protected $fillable = [
        'name',
        'code',
        'menu',//save id of user or category
        'function_id'
    ];

    public static function getAllPermission(){
        return Permission::all();
    }
}
