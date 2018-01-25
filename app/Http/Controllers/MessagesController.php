<?php

namespace App\Http\Controllers;

use App\Model\Message;
use App\Model\Role;
use App\Model\RoleType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $createAction = false;
        if($roletypeAuth->code == 'manager' || $roleAuth->code == 'ambassador'){
            $createAction = true;
        }

        $messages = Message::getMessageOfUser($auth->id);
        $count = Message::countYetNotRead($auth->id);
        $messagesDelete = Message::getAllMessageDeleted($auth->id);
        $countDelete = count($messagesDelete);
        return view('messages.mailbox',
            [
                'messages' => $messages,
                'count' => $count,
                'messagesDelete'=>$messagesDelete,
                'countDelete' => $countDelete,
                'createAction' => $createAction
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $createAction = false;
        $receivers = User::all();
        if($roletypeAuth->code == 'manager' || $roleAuth->code == 'ambassador'){
            $createAction = true;
        }
        if($roleAuth->code == 'sale'){
            $receivers = User::getAllConsultant();
        }
        if($roleAuth->code == 'community' || $roleAuth->code == 'ambassador'){
            $receivers = User::getAllTipster();
        }

        $count = Message::countYetNotRead($auth->id);
        $messagesDelete = Message::getAllMessageDeleted($auth->id);
        $countDelete = count($messagesDelete);
        return view('messages.compose')->with([
            'count' => $count,
            'messagesDelete'=>$messagesDelete,
            'countDelete' => $countDelete,
            'receivers' => $receivers,
            'createAction' => $createAction
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $message = $this->validate($request,[
            'receiver' => 'required'
        ]);
        $message['receiver'] = $request->get('receiver');
        $message['author'] = Auth::user()->id;
        $message['title'] = $request->get('title');
        $message['content'] = $request->get('content');
        $message['delete_is'] = 0;
        $message['read_is'] = 0;
        Message::create($message);
        return redirect('messages')->with('success', 'Send message successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $auth = Auth::user();
        $message = Message::find($id);
        $count = Message::countYetNotRead($auth->id);
        $messagesDelete = Message::getAllMessageDeleted($auth->id);
//        die();
        return view('messages.readmail', compact('message', 'id'))->with([
            'count' => $count,
            'messagesDelete'=>$messagesDelete,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
//        $message =  Message::find($id);
//        return view('messages.edit', compact('message', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $message = Message::find($id);
        $message->delete_is = 1;
        $message->save();
        return redirect('messages')->with('success', 'Your message removed to the trash.');
    }

    public function trash(){
        $auth = Auth::user();
        $count = Message::countYetNotRead($auth->id);
        $messages = Message::getAllMessageDeleted($auth->id);
        $countDelete = count($messages);
        return view('messages.trash', [
            'messages' => $messages,
            'count' => $count,
            'countDelete' => $countDelete
        ]);
    }

    public function sent(){
        $auth = Auth::user();
        $messages = Message::getMessageSent($auth->id);
        $count = count($messages);

        return view('messages.sent',[
            'messages' => $messages,
            'count' => $count
        ]);
    }
}
