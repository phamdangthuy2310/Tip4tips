<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = 'messages';
    protected $fillable = [
        'title',
        'content',
        'sender',
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
}
