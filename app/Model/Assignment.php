<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
