<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function getNameRoleByID($id){
        $name = Role::find($id)->name;
        return $name;
    }

    public static function getIDRoleByCode($code){
        $code = DB::table('roles')
        ->where('code', $code)
        ->select('id')
        ->get();
        return $code;
    }

    public static function getAllRoleInCompany(){
        $roles = DB::table('roles')
        ->whereNOTIn('id', function ($query){
            $query->select('id')->where('code', 'tipster')->from('roletypes');
        })->get();
        return $roles;
    }


}
