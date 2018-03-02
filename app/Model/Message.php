<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    //
    protected $table = 'messages';
    protected $fillable = [
        'title',
        'content',
        'author',
        'receiver',
        'delete_is',
        'read_is',
        'create_at'
    ];
    public static function getMessageByID($id){
        $message = Message::find($id);
        $message['authorMess'] = User::getUserByID($message->author)->username;
        $message['receiverMess'] = User::getUserByID($message->receiver)->username;
        return $message;
    }

    public static function countMessageInbox($auth, $limit = 10000){
        $message = Message::where([
            ['delete_is', 0],
            ['receiver', $auth]
        ])
            ->orderBy('updated_at', 'desc')
            ->paginate($limit);
        return $message->total();
    }

    public static function countYetNotRead($auth, $limit = 10000){
        $message = Message::where([
            ['delete_is', 0],
            ['read_is', 0],
            ['receiver', $auth]
        ])
            ->orderBy('updated_at', 'desc')
        ->paginate($limit);
        return $message;
    }

    public static function getAllMessageDeleted($auth, $limit = 10000){
        $messages = Message::where([
            ['delete_is','=', 1],
            ['delete_trash','=', 0],
            ['receiver', '=', $auth],
        ])
            ->orderBy('updated_at', 'desc')->paginate($limit);
        foreach ($messages as $message){
            $message['authorMess'] = User::getUserByID($message->author)->username;
            $message['receiverMess'] = User::getUserByID($message->receiver)->username;
        }
        return $messages;
    }

    public static function getMessageOfUser($user, $limit = 10000){
        $messages = Message::where([
            ['receiver', '=',$user],
            ['delete_is','=',0]
        ])
            ->orderBy('created_at', 'desc')->paginate($limit);
        foreach ($messages as $message){
            $message['authorMess'] = User::getUserByID($message->author)->username;
            $message['receiverMess'] = User::getUserByID($message->receiver)->username;
        }
        return $messages;
    }

    public static function getMessageSent($user, $limit = 1000){
        $messages = Message::where([
            ['author','=',$user],
            ['delete_is','=',0],
            ['delete_sent','=',0]
        ])->orderBy('created_at', 'desc')->paginate($limit);
        foreach ($messages as $message){
            $message['authorMess'] = User::getUserByID($message->author)->username;
            $message['receiverMess'] = User::getUserByID($message->receiver)->username;
        }
        return $messages;
    }
}
