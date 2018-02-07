<?php

namespace App\Http\Controllers;

use App\Common\Common;
use App\Model\Assignment;
use App\Model\Lead;
//use Illuminate\Foundation\Auth\User;
use App\Model\LogActivity;
use App\Model\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if(isset($user)){
            return redirect('dashboard');
        }else {
            return redirect('login');
        }
        //return view('home');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $recentleads = Lead::getRecentLeads(10);
        foreach ($recentleads as $recentlead){
            $recentlead->created_date = Common::dateFormat($recentlead->created_at,'d-M-Y');
            $recentlead->status_text = Common::showNameStatus($recentlead->status);
            $recentlead->status_color = Common::colorStatus($recentlead->status);
        }

        $recenttipsters = User::getRecentTipsters(10);
        $mostactivetipsters = Assignment::getMostActiveTipsters(10);

        dd($mostactivetipsters);
        $highestPointTipsters = User::getHighestPointTipster();

        $new = Lead::getAmountByStatus(0);
        $call = Lead::getAmountByStatus(1);
        $quote = Lead::getAmountByStatus(2);
        $win = Lead::getAmountByStatus(3);
        $lost = Lead::getAmountByStatus(4);

        /*Get log activities by role*/
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $logActivities = [];
        if($roleAuth->code == 'admin'){
            $logActivities = LogActivity::getAllLogs();
        }else{
            $logActivities = LogActivity::getLogActivityByUserID($auth->id);
        }

        foreach ($logActivities as $logActivity){
            $logActivity->user_name = User::getUserByID($logActivity->user_id)->username;
        }

        return view('admin.dashboard',compact('user',$user))->with([
            'recentleads' => $recentleads,
            'recenttipsters' => $recenttipsters,
            'highestPointTipsters' => $highestPointTipsters,
            'mostactivetipsters' => $mostactivetipsters,
            'new' => $new,
            'call' => $call,
            'quote' => $quote,
            'win' => $win,
            'lost' => $lost,
            'logActivities' => $logActivities
        ]);
    }

}
