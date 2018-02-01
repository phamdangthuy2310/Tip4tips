<?php

namespace App\Http\Controllers;

use App\Common\Common;
use App\Model\Lead;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
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

//        $recenttipsters = User::getRecentTipster();

        return view('admin.dashboard',compact('user',$user))->with([
            'recentleads' => $recentleads,
//            'recenttipsters' => $recenttipsters
        ]);
    }
}
