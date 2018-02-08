<?php

namespace App\Http\Controllers;

use App\Model\LogActivity;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Log;

class LogActivitiesController extends Controller
{
    public function index()
    {
        //
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $logActivities = [];
        if($roleAuth->code == 'admin'){
            $logActivities = LogActivity::getAllLogs(100);
        }else{
            $logActivities = LogActivity::getLogActivityByUserID($auth->id);
        }

        foreach ($logActivities as $logActivity){
            $logActivity->user_name = User::getUserByID($logActivity->user_id)->username;
        }
        return view('activities.index')->with([
            'logActivities' => $logActivities
        ]);
    }
    public function destroy($id)
    {
        //
        $log = LogActivity::find($id);
        try{
            $log->delete();
        }catch (Exception $e){
            Log::error($e->getMessage());
        }

        return back();
    }

}
