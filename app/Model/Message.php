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

    public static function countYetNotRead($auth){
        $message = Message::where([
            ['delete_is', 0],
            ['read_is', 0],
            ['receiver', $auth]
        ])
            ->orderBy('updated_at', 'desc')
        ->paginate(3);
        return $message->total();
    }

    public static function getAllMessageDeleted($auth){
        $message = Message::where([
            ['delete_is','=', 1],
            ['delete_trash','=', 0],
            ['receiver', '=', $auth],
        ])
            ->orderBy('updated_at', 'desc')->paginate(3);
        return $message;
    }

    public static function getMessageOfUser($user){
        $messages = Message::where([
            ['receiver', '=',$user],
            ['delete_is','=',0]
        ])
            ->orderBy('created_at', 'desc')->paginate(3);
        return $messages;
    }

    public static function getMessageSent($user){
        $messages = Message::where([
            ['author','=',$user],
            ['delete_is','=',0],
            ['delete_sent','=',0]
        ])->orderBy('created_at', 'desc')->paginate(3);
        return $messages;
    }
}
