<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //
    protected $table = 'leads';
    protected $fillable = [
        'email',
        'fullname',
        'gender',
        'birthday',
        'address',
        'phone',
        'need',
        'region_id',
        'tipster_id'
    ];

    public function region(){
        return $this->belongsTo('App\Region');
    }
    public function tipster(){
        return $this->belongsTo('App\User');
    }
}
