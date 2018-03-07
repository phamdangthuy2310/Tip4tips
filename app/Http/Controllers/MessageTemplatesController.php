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

    public function sendMail(){
        $data['title'] = 'Tip4tip Website Mail';
//        $subject = 'Thank you';

        $data['body'] = '<p>Hello {{tipster.name}},</p>'.
            '<p>Thank you.</p>';

        Mail::send('messagetemplates.emails.email', $data, function($message) {

            $message->to('phamdangthuy2310@gmail.com', 'Receiver Name')

                ->subject('Thank you for your introduce.');

        });

        dd("Mail Sent successfully");
    }
}
