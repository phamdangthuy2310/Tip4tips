<?php

namespace App\Http\Middleware;

use App\Model\LogActivity;
use Closure;
use Illuminate\Support\Facades\Auth;
use Log;

class SaveHistoryActionUser
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
        try{
            if(Auth::check()){
                //save history action user
                //if method is post : create,update,delete
                if($request->isMethod('post')){
                    if(isset($request->affected_object) && isset($request->action_history)){
                        $affected_object = $request->affected_object;
                        $action_history = $request->action_history;
                        $name_object_history = "";
                        if(isset($request->name_object_history)){
                            eval ( " \$name_object_history= \$request->". $request->name_object_history." ; ");
                        }else{
                            $name_object_history = $request->name_update;
                        }
                        $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        if(isset($request->description_history)){
                            $description = $request->description_history;
                        }
                        $user_id = Auth::user()->id;
                        //create history
                        $logActivity['user_id'] = $user_id;
                        $logActivity['affected_object'] = $affected_object;
                        $logActivity['action'] = $action_history;
                        $logActivity['description'] = $description;
                        $logActivity = LogActivity::create($logActivity);
                        $request->log_activity_id = $logActivity->id;
                    }
                }
            }
        }catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return $next($request);
    }

    private function getDescription($affected_object,$action_history, $name_object_history = null){
        if(isset($name_object_history)){
            return $action_history." ".$affected_object. " : " .$name_object_history ;
        }
        return $action_history." ".$affected_object;
    }
}
