<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lead extends Model
{
    //
    protected $table = 'leads';
    protected $fillable = [
        'email',
        'fullname',
        'gender',
        'birthday',
        'address',
        'phone',
        'product_id',
        'status',
        'region_id',
        'tipster_id'
    ];

    public function region(){
        return $this->belongsTo('App\Region');
    }
    public function tipster(){
        return $this->belongsTo('App\User');
    }

    public static function getAllLeadNotYetAssign(){
        $leads = DB::table('leads')->select('*')
            ->whereNOTIn('id', function ($query){
                $query->select('lead_id')->from('assignments');
            })->get();
        return $leads;
    }

    public static function getLeadByID($id){
        $name = Lead::where('leads.id', $id)
            ->select('leads.*')->first();
        return $name;
    }

    public static function showNameStatus($statusID){
        $name = '';
        switch ($statusID){
            case 0:
                $name = 'New';
                break;
            case 1:
                $name = 'Quote';
                break;
            case 2:
                $name = 'Call';
                break;
            case 3:
                $name = 'Win';
                break;
            case 4:
                $name = 'Lost';
                break;
        }
        return $name;
    }
    public static function showColorStatus($statusID){
        $name = '';
        switch ($statusID){
            case 0:
                $name = 'label-new';
                break;
            case 1:
                $name = 'label-quote';
                break;
            case 2:
                $name = 'label-call';
                break;
            case 3:
                $name = 'label-win';
                break;
            case 4:
                $name = 'label-lost';
                break;
        }
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
