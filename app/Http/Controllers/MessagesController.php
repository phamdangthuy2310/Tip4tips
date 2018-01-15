<?php

namespace App\Http\Controllers;

use App\Model\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $messages = Message::where('delete_is', 0)->get();
        $count = $this->countYetNotRead();
        $messagesDelete = $this->getAllMessageDeleted();
        $countDelete = count($messagesDelete);
        return view('messages.mailbox',
            [
                'messages' => $messages,
                'count' => $count,
                'messagesDelete'=>$messagesDelete,
                'countDelete' => $countDelete
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
        $count = $this->countYetNotRead();
        $messagesDelete = $this->getAllMessageDeleted();
        $countDelete = count($messagesDelete);
        return view('messages.compose')->with([
            'count' => $count,
            'messagesDelete'=>$messagesDelete,
            'countDelete' => $countDelete
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
            'receiver'
        ]);
        $message['receiver'] = $request->get('receiver');
        $message['sender'] = 'admin';
        $message['title'] = $request->get('title');
        $message['content'] = $request->get('content');
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

        $message = Message::find($id);
        $count = $this->countYetNotRead();
        $messagesDelete = $this->getAllMessageDeleted();
        $countDelete = count($messagesDelete);
//        die();
        return view('messages.readmail', compact('message', 'id'))->with([
            'count' => $count,
            'messagesDelete'=>$messagesDelete,
            'countDelete' => $countDelete
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

    public function countYetNotRead(){
        $message = Message::where('read_is', 0)->where('delete_is', 0)->get();
        return count($message);
    }

    public function getAllMessageDeleted(){
        $message = Message::where('delete_is', 1)->get();
        return $message;
    }

    public function trash(){
        $count = $this->countYetNotRead();
        $messages = $this->getAllMessageDeleted();
        $countDelete = count($messages);
        return view('messages.trash', [
            'messages'=>$messages,
            'count' => $count,
            'countDelete' => $countDelete
        ]);
    }
}