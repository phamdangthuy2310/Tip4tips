<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    protected $table = 'assignments';
    protected $fillable = [
        'consultant_id',
        'lead_id',
        'create_by'
    ];
}
