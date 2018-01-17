<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        $role_id = Auth::User()->role_id;
        $uri = $request->path();
        $arrayUrl = [];
        switch ($role_id) {
            case 1:
                $arrayUrl = ['users','leads','products','tipsters','gifts','messages'];
                break;
            case 2:
                $arrayUrl = ['tipsters','products','gifts','messages'];
                break;
            case 3:
                echo "Your favorite color is green!";
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
        }
        foreach($arrayUrl as $url){
            if(strpos($uri, $url) !== false){
                return $next($request);
            }
        }
        return redirect()->route('home');
    }
}
