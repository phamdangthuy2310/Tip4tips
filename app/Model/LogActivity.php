<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'log_activities';
    protected $fillable = [
        'user_id',
        'affected_object',
        'action',
        'description'
    ];

    public static function getLogActivityByUserID($user_id){
        $logs = LogActivity::where('user_id', $user_id)->get();
        return $logs;
    }

    public static function getAllLogs(){
        $logs = LogActivity::all();
        return $logs;
    }
}
