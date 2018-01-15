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
        'need',
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
}