<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeadProcess extends Model
{
    //
    protected $table = 'leadprocesses';
    protected $fillable = [
        'lead_id',
        'status_id',
        'created_at'
    ];

    public static function getAllProcesses(){
        return LeadProcess::all();
    }

    public static function getStatusByLead($lead){
        $statuses = LeadProcess::where('lead_id', $lead)->orderBy('created_at', 'desc')->get();
        return $statuses;
    }

    public static function checkExist($lead, $status){
        $result = LeadProcess::where([
            ['lead_id', $lead],
            ['status_id', $status]
        ])->get();
        return $result;
    }
}
