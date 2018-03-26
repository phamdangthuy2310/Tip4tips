<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\RoleType;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $remember = false;
        if(!empty($request->get('remember'))){
            $remember = true;
        }
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'delete_is' => 0], $remember)) {
            // The user is active, not suspended, and exists.
            // Redirect home page
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->withErrors('Your email, password incorrect or Your account locked.');
        }

    }
}
