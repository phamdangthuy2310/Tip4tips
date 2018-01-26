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
        $statuses = LeadProcess::where('lead_id', $lead)->get();
        return $statuses;
    }
}
