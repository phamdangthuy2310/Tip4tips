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

    public static function countYetNotRead(){
        $message = Message::where('read_is', 0)->where('delete_is', 0)->get();
        return count($message);
    }

    public static function getAllMessageDeleted(){
        $message = Message::where('delete_is', 1)->get();
        return $message;
    }

    public static function getMessageOfUser($user){
        $messages = Message::where('receiver', $user)->get();
        return $messages;
    }
}
