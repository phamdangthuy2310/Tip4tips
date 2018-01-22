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
                $arrayUrl = ['users','leads','products','productcategories','tipsters','gifts','giftcategories','messages', 'assignments'];
                break;
            case 'community':
                $arrayUrl = ['users','leads','tipsters','products','gifts','messages'];
                break;
            case 'sale':
                $arrayUrl = ['users','leads','tipsters','products','gifts','messages'];
                break;
            case 'insurance':
            case 'car':
            case 'realestate':
            case 'service':
                $arrayUrl = ['users','leads','products','gifts','messages'];
                break;
            case 'ambassador':
                $arrayUrl = ['users','tipsters','leads','products','gifts','messages'];
                break;
            case 'tipster_normal':
                $arrayUrl = ['users','tipsters','leads','products','gifts','messages'];
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