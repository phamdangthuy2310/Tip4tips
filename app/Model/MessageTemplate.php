<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MessageTemplate extends Model
{
    //
    protected $table = 'message_templates';
    protected $fillable = [
        'message_id',
        'subject_vn',
        'subject_en',
        'content_vn',
        'content_en'
    ];

    public static function getAllTemplate(){
        return MessageTemplate::all();
    }
    public static function getTemplateByID($id){
        return MessageTemplate::find($id);
    }

}
