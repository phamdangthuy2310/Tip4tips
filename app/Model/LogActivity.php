<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'log_activities';
    protected $fillable = [
        'user_id',
        'affected_object_id',
        'action',
        'description'
    ];
}
