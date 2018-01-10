<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'permissions';
    protected $fillable = [
        'name',
        'code'
    ];

    public static function getAllPermission(){
        return Permission::all();
    }
}
