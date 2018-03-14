<?php

namespace App\Http\Controllers;

use App\Model\LogsSentMessageTemplate;
use App\User;
use Illuminate\Http\Request;

class LogsSentMessageTemplatesController extends Controller
{
    /**
     * Display a listing of the logssentmessagetemplates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $logs = LogsSentMessageTemplate::getAllLogSentMessageTemplates();
        foreach ($logs as $log){
            if($log->sender_id > 0){
                $log['senderName'] = User::getUserByID($log->sender_id)->fullname;
            }else{
                $log['senderName'] = "Tip4tips App System";
            }
            $log['receiverName'] = User::getUserByID($log->receiver_id)->fullname;
        }
        return view('logssentmessagetemplates.index')->with([
            'logs' => $logs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Request()->validate([
            'sender_id' => 'required'
        ]);
        $logs['sender_id'] = $request->sender_id;
        $logs['receiver_id'] = $request->receiver_id;
        $logs['message_id'] = $request->message_id;
        $logs['subject'] = $request->subject;
        $logs['content'] = $request->contentMessage;

        LogsSentMessageTemplate::create($logs);

        return redirect()->route('logsentmessages.index')->with('success', 'Save Successfully.');

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
        $logs = LogsSentMessageTemplate::find($id);
        $logs->delete();
        return redirect()->route('logsentmessages.index')->with('success', 'Delete Successfully.');
    }
}
