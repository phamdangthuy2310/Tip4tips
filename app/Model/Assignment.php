<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assignment extends Model
{
    //
    protected $table = 'assignments';
    protected $fillable = [
        'consultant_id',
        'lead_id',
        'create_by'
    ];

    public static function getLeadbyConsultant($consultant_id){
        $leads = Assignment::where('consultant_id', $consultant_id)->get();
        return $leads;
    }
    public static function getConsultantByLead($lead_id){
        $consultant = Assignment::where('lead_id', $lead_id)->orderBy('created_at', 'desc')->first();
        return $consultant;
    }

}
