<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PointHistory extends Model
{
    //
    protected $table = 'point_histories';
    protected $fillable = [
        'tipster_id',
        'lead_id',
        'point',
        'comment',
        'activity'
    ];

    public static function getAllPointHistories(){
        $points = PointHistory::all();
        return $points;
    }

    public static function getPointByTipsterID($tipster_id){
        $points = PointHistory::where('tipster_id', $tipster_id)->get();
        return $points;
    }
    public static function getPointByTipsterIDLeadID($tipster_id, $lead_id){
        $points = PointHistory::where([
            ['tipster_id', $tipster_id],
            ['lead_id', $lead_id]
        ])->orderBy('created_at', 'desc')->first();
        return $points;
    }

    public static function countRowPlusPointForTipsterFollowLead($lead_id, $tipster_id){
        $rows = PointHistory::where([
            ['lead_id', $lead_id],
            ['tipster_id', $tipster_id]
        ])->first();
        return $rows;
    }
}
