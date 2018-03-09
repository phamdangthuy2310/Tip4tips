<?php

namespace App\Http\Controllers;

use App\Model\Lead;
use App\Model\MessageTemplate;
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
        request()->validate([
            'message_id' => 'required'
        ]);
        $message['message_id'] = $request->message_id;
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
        return view('messagetemplates.sendmessage', compact('template', $template))->with([
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
//        $points = $request->points;
        $lead = Lead::getLeadByID($request->lead_id);
//        $product = Product::getProductByID($request->lead->id);
        $template = MessageTemplate::getTemplateByID($id);
//        dd($product);
//        $subject = 'Thank you';

        $keys = ([
            'tipster.name' => $tipster->fullname,
            'lead.name' => $lead->fullname,
        ]);

        if($tipster->prefferd_lang == 'vn'){
            $title = $template->subject_vn;
            $content = $template->content_vn;
        }else{
            $title = $template->subject_en;
            $content = $template->content_en;
        }
        $data['title'] = $title;
        foreach ($keys as $key=> $value){
            $content = str_replace('['.$key.']', $value, $content);
        }
        $data['body'] = $content;
        Mail::send('messagetemplates.emails.email', $data, function($message) {

            $message->to('phamdangthuy2310@gmail.com', 'Receiver Name')

                ->subject('Thank you for your introduce.');

        });

        dd("Mail Sent successfully");
    }
}
