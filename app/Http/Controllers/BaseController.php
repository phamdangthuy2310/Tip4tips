<?php

namespace App\Http\Controllers;

use App\Model\LogActivity;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public static function rollbackLogActiviteis(Request $request){
        if(isset($request->log_activity_id)){
            $logActivity = LogActivity::find($request->log_activity_id);
            if(null != $logActivity){
                $logActivity->delete();
            }
        }
    }
}
