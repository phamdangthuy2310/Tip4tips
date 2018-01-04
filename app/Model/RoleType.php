<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleType extends Model
{
    //
    protected $table = 'roletypes';
    protected $fillable = [
        'name',
        'code'
    ];

}
