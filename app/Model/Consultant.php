<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends User
{
    //
    protected $fillable = [
        'rate',
        'bussinesstype',
        'user_id'
    ];

}
