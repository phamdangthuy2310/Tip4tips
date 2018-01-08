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
        'create_at'
    ];
}
