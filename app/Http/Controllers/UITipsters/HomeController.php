<?php

namespace App\Http\Controllers\UITipsters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function home(){
        return view('UITipster.home');
    }
}
