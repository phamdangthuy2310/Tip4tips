<?php

namespace App;

use App\Model\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
//    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'username',
        'email',
        'password',

        'fullname',
        'gender',
        'birthday',
        'address',
        'phone',
        'role_id',
        'region_id',
        'delete_is'
    ];

    public function region(){
        return $this->belongsTo('App\Region');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function getAllRole(){
        return Role::all();
    }

    public static function getAllConsultant(){
        $consultants = User::select('users.*')
            ->join('roles', 'users.role_id', 'roles.id')
            ->join('roletypes', 'roles.roletype_id', 'roletypes.id')
            ->where('roletypes.code' ,'consultant')
            ->get();
        return $consultants;
    }
    public static function getAllManager(){
        $managers = User::select('users.*')
            ->join('roles', 'users.role_id', 'roles.id')
            ->join('roletypes', 'roles.roletype_id', 'roletypes.id')
            ->where('roletypes.code' ,'manager')
            ->get();
        return $managers;
    }
    public static function getAllRoleByCode($code){
        $roles = DB::table('users')
            ->join('roles', 'users.role_id', 'roles.id')
            ->join('roletypes', 'roletypes.id', 'roles.roletype_id')
            ->select('users.*', 'roles.code as role', 'roletypes.name as roletype')
            ->where('roles.code' ,$code)
            ->get();
        return $roles;
    }

    public static function getAllTipster(){
        $managers = User::select('users.*')
            ->join('roles', 'users.role_id', 'roles.id')
            ->join('roletypes', 'roles.roletype_id', 'roletypes.id')
            ->where('roletypes.code' ,'tipster')
            ->get();
        return $managers;
    }

    public static function getUserByID($id){
        $name = User::where('users.id', $id)
            ->select('users.*')->first();
        return $name;
    }

    public static function showGender($gender){
        $name = '';
        switch ($gender){
            case 0:
                $name = 'Male';
                break;
            case 1:
                $name = 'Female';
                break;
        }
        return $name;
    }


}
