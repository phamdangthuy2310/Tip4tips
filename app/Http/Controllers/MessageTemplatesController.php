<?php

namespace App\Http\Controllers;

use App\Model\Lead;
use App\Model\LogsSentMessageTemplate;
use App\Model\MessageTemplate;
use App\Model\PointHistory;
use App\Model\Product;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageTemplatesController extends Controller
{
    //
    public function index(){
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $editAction = false;
        $deleteAction = false;
        $createAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin'){
            $editAction = true;
            $deleteAction = true;
            $createAction = true;
        }
        $templates = MessageTemplate::getAllTemplate();
        return view('messagetemplates.index')->with([
            'templates' => $templates,
            'editAction' => $editAction,
            'deleteAction' => $deleteAction,
            'createAction' => $createAction
        ]);
    }
    /*-------------------------------------------------------
     * Display layout
     * that let user can enter information about new template
    ---------------------------------------------------------*/
    public function create(){
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $createAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin'){
            $createAction = true;
        }

        $tipsters = User::getAllTipster();
        $leads = Lead::getAllLead();
        $products = Product::getAllProduct();
        return view('messagetemplates.create')->with([
            'createAction' => $createAction,
            'tipsters' => $tipsters,
            'leads' => $leads,
            'products' => $products
        ]);
    }
    /*---------------------------------------
     * HANDLE: Create a new row in database
     * message_id is required
    ---------------------------------------*/
    public function store(Request $request){
        $v = request()->validate([
            'message_id' => 'required|unique:message_templates,message_id|required_without:'
        ]);

        $message_id = $request->message_id;
        $message['message_id'] = $message_id;
        $message['subject_vn'] = $request->subject_vn;
        $message['subject_en'] = $request->subject_en;
        $message['content_vn'] = $request->content_vn;
        $message['content_en'] = $request->content_en;
        MessageTemplate::create($message);

        return redirect()->route('messagetemplates.index');
    }
    /*--------------------------------------------------------
     * Display layout
     * to user can edit the informations of message tempplate.
     --------------------------------------------------------*/
    public function edit($id){
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $editAction = false;
        $deleteAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin'){
            $editAction = true;
            $deleteAction = true;
        }

        $template = MessageTemplate::find($id);
        $tipsters = User::getAllTipster();
        $leads = Lead::getAllLead();
        $products = Product::getAllProduct();
        return view('messagetemplates.edit')->with([
            'editAction' => $editAction,
            'tipsters' => $tipsters,
            'leads' => $leads,
            'products' => $products,
            'template' => $template
        ]);
    }

    /*---------------------------------------
     * HANDLE: Save information
     *  that has been changed by user
    ---------------------------------------*/
    public function update(Request $request, $id){
        $template = MessageTemplate::getTemplateByID($id);
        request()->validate([
            'message_id' => 'required'
        ]);
        $template->message_id = $request->get('message_id');
        $template->subject_vn = $request->get('subject_vn');
        $template->subject_en = $request->get('subject_en');
        $template->content_vn = $request->get('content_vn');
        $template->content_en = $request->get('content_en');
        $template->save();
        return redirect()->route('messagetemplates.index')->with('Updated template successfully.');
    }

    /*---------------------------------------
     * Display message template by id
    ---------------------------------------*/
    public function show($id){
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $editAction = false;
        $deleteAction = false;
        $createAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin'){
            $editAction = true;
            $deleteAction = true;
            $createAction = true;
        }
        $template = MessageTemplate::getTemplateByID($id);
        return view('messagetemplates.show', compact('template', $template))->with([
            'editAction' => $editAction,
            'deleteAction' => $deleteAction,
            'createAction' => $createAction
        ]);
    }


    /*---------------------------------------
     * Display template send message
    ---------------------------------------*/
    public function showSendMessage($id){
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $editAction = false;
        $deleteAction = false;
        $createAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin'){
            $editAction = true;
            $deleteAction = true;
            $createAction = true;
        }

        $tipsters = User::getAllTipster();
        $leads = Lead::getAllLead();
        $products = Product::getAllProduct();
        $template = MessageTemplate::getTemplateByID($id);
        return view('messagetemplates.showsendmessage', compact('template', $template))->with([
            'editAction' => $editAction,
            'deleteAction' => $deleteAction,
            'createAction' => $createAction,
            'tipsters' => $tipsters,
            'leads' => $leads,
            'products' => $products
        ]);
    }

    /*---------------------------------------
     * HANDLE: Send message to tipster email
    ---------------------------------------*/
    public function sendMail(Request $request, $id){
        $tipster = User::getUserByID($request->tipster_id);
        /*Set default*/
        $lead_name = '';
        $product_name = '';
        $points_new = 0;
        $points_current= 0;
        if(!empty($request->lead_id)){
            $lead = Lead::getLeadByID($request->lead_id);
        }

        if(!empty($request->points_new)){
            $points_new = $request->points_new;
            if($points_new < 1){
                $points_new = 0;
            }
        }else{
            if(!empty($tipster->id && !empty($lead->id)))
            $points_new = PointHistory::getPointByTipsterIDLeadID($tipster->id, $lead->id);
        }
        if(!empty($request->points_current)){
            $points_current = $request->points_current;
            if($points_current < 1){
                $points_current = 0;
            }
        }else{
            $points_current = $tipster->point;
        }

        $product_id = $request->product_id;
        if(!empty($product_id)){
            $product = Product::getProductByID($product_id);
        }else{
            if(!empty($lead->product_id)){
                $product = Product::getProductByID($lead->product_id);
            }
        }
        if(!empty($tipster)){
            $tipster_name = $tipster->fullname;
        }

        $template = MessageTemplate::getTemplateByID($id);


        /*------------------------------------------------------
         * Check Preferred Language to set title & content consistent
         *------------------------------------------------------ */
        if($tipster->preferred_lang == 'vn'){
            $title = $template->subject_vn;
            $content = $template->content_vn;
        }else{
            $title = $template->subject_en;
            $content = $template->content_en;
        }
        if(!empty($lead)){
            $lead_name = $lead->fullname;
        }
        if(!empty($product)){
            $product_name = $product->name;
        }

        $data['title'] = $title;
        $keys = ([
            'tipster.name' => $tipster_name,
            'lead.name' => $lead_name,
            'product.name' => $product_name,
            'points.new' => $points_new,
            'points.current' => $points_current,
        ]);


        foreach ($keys as $key=> $value){
            $content = str_replace('['.$key.']', $value, $content);
        }
        $data['body'] = $content;
        $emailTo = $tipster->email;
        $subjectTo = $title;

        Mail::send('messagetemplates.emails.email', $data, function($message) use ($emailTo, $subjectTo, $tipster_name) {

            $message->to($emailTo, $tipster_name)
                ->subject($subjectTo);

        });

        $user = Auth::user();
        $logs['sender_id'] = $user->id;
        $logs['receiver_id'] = $tipster->id;
        $logs['message_id'] = $template->message_id;
        $logs['subject'] = $title;
        $logs['content'] = $content;
        LogsSentMessageTemplate::create($logs);

        return redirect()->route('messagetemplates.index')->with('success', 'Send message successfully.');
    }
}
