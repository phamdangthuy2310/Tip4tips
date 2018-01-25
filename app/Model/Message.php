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
            ['read_is', 0],
            ['receiver', $auth]
        ])->where('delete_is', 0)->get();
        return count($message);
    }

    public static function getAllMessageDeleted($auth){
        $message = Message::where([
            ['delete_is','=', 1],
            ['receiver', '=', $auth]
        ])->get();
        return $message;
    }

    public static function getMessageOfUser($user){
        $messages = Message::where([
            ['receiver', '=',$user],
            ['delete_is','=',0]
        ])->get();
        return $messages;
    }

    public static function getMessageSent($user){
        $messages = Message::where([
            ['author','=',$user],
            ['delete_is','=',0]
        ])->get();
        return $messages;
    }
}
