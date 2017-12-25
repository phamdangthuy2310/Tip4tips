<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipster extends User
{
    //
    protected $fillable = [
        'point',
        'rate',
        'ambassadors',
    ];
}
