<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogsSentMessageTemplate extends Model
{
    //
    protected $table = 'logs_sent_message_templates';
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message_id',
        'subject',
        'content'
    ];

    public static function getAllLogSentMessageTemplates(){
        $logs = LogsSentMessageTemplate::select('*')->orderBy('created_at', 'desc')->get();
        return $logs;
    }

    public static function getLogSentMessageTemplatesByMessageID($messID){
        $logs = LogsSentMessageTemplate::where('message_id', $messID)->get();
        return $logs;
    }

    public static function getLogSentMessageTemplatesBySenderID($sendID){
        $logs = LogsSentMessageTemplate::where('sender_id', $sendID)->get();
        return $logs;
    }

    public static function getLogSentMessageTemplatesByReceiverID($receiverID){
        $logs = LogsSentMessageTemplate::where('receiver_id', $receiverID)->get();
        return $logs;
    }
}
