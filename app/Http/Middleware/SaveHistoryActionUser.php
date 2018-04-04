<?php

namespace App\Http\Middleware;

use App\Model\Gift;
use App\Model\Lead;
use App\Model\LogActivity;
use App\Model\Product;
use App\Model\Region;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Log;
use App\Common\Utils;

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
                Log:info($request->url());
                if($request->isMethod('post')){
                    $url = $request->url();
                    $user_id = Auth::user()->id;
                    $action_history = null;

                    if (strpos($url, 'messagetemplates') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_MESSAGE_TEMPLATE;
                        if (strpos($url,"create") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_CREATE;
                            $name_object_history = $request->message_id;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }

                    if (strpos($url, 'leads') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_LEAD;
                        if (strpos($url,"create") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_CREATE;
                            $name_object_history = $request->fullname;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }else if (strpos($url,"ajaxStatus") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_UPDATE;
                            $name_object_history = $request->fullname;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }

                    }
                    if (strpos($url, 'tipsters') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_TIPSTER;
                        if (strpos($url,"create") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_CREATE;
                            $name_object_history = $request->fullname;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }else if (strpos($url,"updatePointAjax") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_UPDATE_POINT;
                            $name_object_history = '';
                            $tipsterId = $request->id_update;
                            $tipster = User::find($tipsterId);
                            if(!empty($tipster)){
                                $name_object_history = $tipster->fullname;
                            }
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }

                    }

                    if (strpos($url, 'users') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_USER;
                        if (strpos($url,"create") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_CREATE;
                            $name_object_history = $request->fullname;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }
                    if (strpos($url, 'products') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_PRODUCT;
                        if (strpos($url,"create") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_CREATE;
                            $name_object_history = $request->name;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }
                    if (strpos($url, 'gifts') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_GIFT;
                        if (strpos($url,"create") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_CREATE;
                            $name_object_history = $request->name;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }
                    if (strpos($url, 'regions') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_REGION;
                        if (strpos($url,"create") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_CREATE;
                            $name_object_history = $request->name;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }


                    if(!empty($action_history)){
                        //create history
                        $logActivity['user_id'] = $user_id;
                        $logActivity['affected_object'] = $affected_object;
                        $logActivity['action'] = $action_history;
                        $logActivity['description'] = $description;
                        $logActivity = LogActivity::create($logActivity);
                        $request->log_activity_id = $logActivity->id;
                    }


//                    if(isset($request->affected_object) && isset($request->action_history)){
//                        $affected_object = $request->affected_object;
//                        $action_history = $request->action_history;
//                        $name_object_history = "";
//                        if(isset($request->name_object_history)){
//                            eval ( " \$name_object_history= \$request->". $request->name_object_history." ; ");
//                        }else{
//                            $name_object_history = $request->name_update;
//                        }
//                        $description = $this->getDescription($affected_object,$action_history, $name_object_history);
//                        if(isset($request->description_history)){
//                            $description = $request->description_history;
//                        }
//                        $user_id = Auth::user()->id;
//                        //create history
//                        $logActivity['user_id'] = $user_id;
//                        $logActivity['affected_object'] = $affected_object;
//                        $logActivity['action'] = $action_history;
//                        $logActivity['description'] = $description;
//                        $logActivity = LogActivity::create($logActivity);
//                        $request->log_activity_id = $logActivity->id;
//                    }
                }
                if($request->isMethod('patch')){
                    $url = $request->url();
                    $user_id = Auth::user()->id;
                    $action_history = null;

                    if (strpos($url, 'messagetemplates') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_MESSAGE_TEMPLATE;
                        if (strpos($url,"update") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_UPDATE;
                            $name_object_history = $request->message_id;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }

                    }
                    if (strpos($url, 'leads') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_LEAD;
                        if (strpos($url,"update") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_UPDATE;
                            $name_object_history = $request->fullname;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }

                    }
                    if (strpos($url, 'tipsters') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_TIPSTER;
                        if (strpos($url,"update") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_UPDATE;
                            $name_object_history = $request->fullname;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }

                    }
                    if (strpos($url, 'users') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_COMMUNITY_MANAGER;// Need check
                        if (strpos($url,"update") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_UPDATE;
                            $name_object_history = $request->fullname;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }

                    }
                    if (strpos($url, 'gifts') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_GIFT;
                        if (strpos($url,"update") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_UPDATE;
                            $name_object_history = $request->name;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }

                    }
                    if (strpos($url, 'regions') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_REGION;
                        if (strpos($url,"update") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_UPDATE;
                            $name_object_history = $request->name;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }

                    }

                    if (strpos($url, 'products') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_PRODUCT;
                        if (strpos($url,"update") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_UPDATE;
                            $name_object_history = $request->name;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }

                    }

                    if(!empty($action_history)){
                        //create history
                        $logActivity['user_id'] = $user_id;
                        $logActivity['affected_object'] = $affected_object;
                        $logActivity['action'] = $action_history;
                        $logActivity['description'] = $description;
                        $logActivity = LogActivity::create($logActivity);
                        $request->log_activity_id = $logActivity->id;
                    }
                }
                if($request->isMethod('delete')){
                    $url = $request->url();
                    $user_id = Auth::user()->id;
                    $action_history = null;
                    if (strpos($url, 'leads') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_LEAD;
                        if (strpos($url,"delete") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_DELETE;
                            $name_object_history = Lead::getLeadByID($request->id)->fullname;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }
                    if (strpos($url, 'tipsters') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_TIPSTER;
                        if (strpos($url,"delete") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_DELETE;
                            $name_object_history = User::getUserByID($request->id)->fullname;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }
                    if (strpos($url, 'users') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_USER;
                        if (strpos($url,"delete") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_DELETE;
                            $name_object_history = User::getUserByID($request->id)->fullname;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }
                    if (strpos($url, 'products') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_PRODUCT;
                        if (strpos($url,"delete") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_DELETE;
                            $name_object_history = Product::getProductByID($request->id)->name;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }
                    if (strpos($url, 'gifts') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_GIFT;
                        if (strpos($url,"delete") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_DELETE;
                            $name_object_history = Gift::getGiftByID($request->id)->name;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }
                    if (strpos($url, 'regions') !== FALSE){
                        //
                        $affected_object = Utils::$LOG_AFFECTED_OBJECT_REGION;
                        if (strpos($url,"delete") !== FALSE){
                            $action_history = Utils::$LOG_ACTION_DELETE;
                            $name_object_history = Region::getNameByID($request->id)->name;
                            $description = $this->getDescription($affected_object,$action_history, $name_object_history);
                        }
                    }


                    if(!empty($action_history)){
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
