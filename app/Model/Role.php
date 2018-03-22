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

    public static function getAllRole(){
        return Role::all();
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public static function getNameRoleByID($id){
        $name = Role::find($id)->name;
        return $name;
    }
    public static function getInfoRoleByID($id){
        $role = Role::find($id);
        return $role;
    }

    public static function getIDRoleByCode($code){
        $code = DB::table('roles')
        ->where('code', $code)
        ->select('*')
        ->first();
        return $code->id;
    }

    public static function getAllRoleInCompany(){
        $roles = DB::table('roles')
        ->whereNOTIn('id', function ($query){
            $query->select('id')->where('code', 'tipster')->from('roletypes');
        })->get();
        return $roles;
    }

    public static function getRoleByCode($code){
        $roles = DB::table('roles')
            ->where('code', $code)
            ->select('*')
            ->get();
        return $roles;
    }
}
