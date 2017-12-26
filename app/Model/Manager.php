<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Manager extends User
{
    //
    protected $fillable = [
        'typemanager',
        'is_delete',
        'user_id'
    ];
}
