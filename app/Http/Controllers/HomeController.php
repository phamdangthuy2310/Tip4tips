<?php

namespace App\Http\Controllers;

use App\Common\Common;
use App\Model\Lead;
//use Illuminate\Foundation\Auth\User;
use App\Model\LogActivity;
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
        $recentleads = Lead::getRecentLead();

        $recenttipsters = User::getRecentTipster();

        $highestPointTipsters = User::getHighestPointTipster();

        $new = Lead::getAmountByStatus(0);
        $call = Lead::getAmountByStatus(1);
        $quote = Lead::getAmountByStatus(2);
        $win = Lead::getAmountByStatus(3);
        $lost = Lead::getAmountByStatus(4);

        $logActivities = LogActivity::getAllLogs();
        foreach ($logActivities as $logActivity){
            $logActivity['user_name'] = User::getUserByID($logActivity->user_id)->username;
        }

        return view('admin.dashboard',compact('user',$user))->with([
            'recentleads' => $recentleads,
            'recenttipsters' => $recenttipsters,
            'highestPointTipsters' => $highestPointTipsters,
            'new' => $new,
            'call' => $call,
            'quote' => $quote,
            'win' => $win,
            'lost' => $lost,
            'logActivities' => $logActivities
        ]);
    }

}
