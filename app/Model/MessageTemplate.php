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

    /*---------------------------------------
     * Get all Message templates
    ---------------------------------------*/
    public static function getAllTemplate(){
        return MessageTemplate::select('*')->orderBy('created_at', 'desc')->get();
    }
    /*---------------------------------------
     * Get all information of template by template id
    ---------------------------------------*/
    public static function getTemplateByID($id){
        return MessageTemplate::find($id);
    }
    /*---------------------------------------
     * Get all information of template by template id code
    ---------------------------------------*/
    public static function getTemplateByMessageID($messId){
        return MessageTemplate::where('message_id', $messId)->first();
    }

}
