<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\DB;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $role = DB::table('users')
        ->where('users.id', Auth::user()->id)
        ->join('roles', 'roles.id', 'users.role_id')
        ->select('users.*', 'roles.name as role', 'roles.code')->first();
//        $role_id = Auth::User()->role_id;
        $uri = $request->path();
        $arrayUrl = [];
        switch ($role->code) {
            case 'admin':
                $arrayUrl = ['regions','messagetemplates','activities','logssentmessagetemplates','leadsprocesses','users','leads','products','productcategories','tipsters','gifts','giftcategories','messages', 'assignments'];
                break;
            case 'community':
                $arrayUrl = ['activities','users','leads','tipsters','products','gifts','messages'];
                break;
            case 'sale':
                $arrayUrl = ['regions','activities','users','leads','tipsters','products','gifts','messages', 'assignments'];
                break;
            case 'insurance':
            case 'car':
            case 'realestate':
            case 'service':
                $arrayUrl = ['activities','users','leads','products','gifts','messages', 'assignments'];
                break;
            case 'ambassador':
                $arrayUrl = ['activities','tipsters','leads','products','gifts','messages', 'users'];
                break;
            case 'tipster_normal':
                $arrayUrl = ['activities','tipsters','leads','products','gifts','messages', 'users'];
                break;
        }
        foreach($arrayUrl as $url){
            if(strpos($uri, $url) !== false){
                return $next($request);
            }
        }
        return redirect()->route('home');
    }
}
