<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
    protected $fillable = [
        'name',
        'code',
        'roletype_id'
    ];

    public function getAllRole(){
        return Role::all();
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}
