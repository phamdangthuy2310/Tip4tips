<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeadProcess extends Model
{
    //
    protected $fillable = [
        'lead_id',
        'status_id',
        'created_at'
    ];

    public static function getAllProcesses(){
        return LeadProcess::all();
    }
}
