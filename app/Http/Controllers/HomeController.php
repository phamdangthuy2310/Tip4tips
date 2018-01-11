<?php

namespace App\Http\Controllers;

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
        return view('admin.dashboard',compact('user',$user));
    }
}
