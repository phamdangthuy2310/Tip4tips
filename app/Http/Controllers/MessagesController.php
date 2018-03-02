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
        return view('messages.mailbox',
            [
                'messages' => $messages,
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

        return view('messages.compose')->with([
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
        $message->read_is = 1;
        $message->save();
        $message['authorMess'] = User::getUserByID($message->author)->username;
        $message['receiverMess'] = User::getUserByID($message->receiver)->username;

        return view('messages.readmail', compact('message', 'id'))->with([
        ]);
    }

    public function showMessageSent($id)
    {
        //
        $message = Message::getMessageByID($id);

        return view('messages.showsent', compact('message', 'id'))->with([

        ]);
    }
    public function showMessageTrack($id)
    {
        //
        $message = Message::getMessageByID($id);

        return view('messages.showtrash', compact('message', 'id'))->with([
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

    public function deleteMessageSent($id)
    {
        //
        $message = Message::find($id);
        $message->delete_sent = 1;
        $message->save();
        return redirect('messages')->with('success', 'Your message removed.');
    }
    public function deleteMessageTrash($id)
    {
        //
        $message = Message::find($id);
        $message->delete_trash = 1;
        $message->save();
        return redirect('messages')->with('success', 'Your message removed.');
    }


    public function trash(){
        $auth = Auth::user();
        $messages = Message::getAllMessageDeleted($auth->id, 50);
        foreach ($messages as $message){
            $message['authorMess'] = User::getUserByID($message->author)->username;
            $message['receiverMess'] = User::getUserByID($message->receiver)->username;
        }

        return view('messages.trash', [
            'messages' => $messages,
//            'count' => $count,
//            'countDelete' => $countDelete
        ]);
    }

    public function sent(){
        $auth = Auth::user();
        $messages = Message::getMessageSent($auth->id, 50);
        $count = $messages->total();

        return view('messages.sent',[
            'messages' => $messages,
            'count' => $count
        ]);
    }
}
