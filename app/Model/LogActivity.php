<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LogActivity extends Model
{
    protected $table = 'log_activities';
    protected $fillable = [
        'user_id',
        'affected_object',
        'action',
        'description'
    ];

    public static function getLogActivityByUserID($user_id, $num = 5){
        $logs = LogActivity::where('user_id', $user_id)->orderBy('created_at', 'desc')->limit($num)->get();
        return $logs;
    }

    public static function getAllLogs($limit = 5){
        $logs = DB::table('log_activities')->select('*')->orderBy('created_at', 'desc')->limit($limit)->get();
        return $logs;
    }
}
