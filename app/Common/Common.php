<?php
namespace App\Common;

use App\Model\Lead;
use App\Model\LogsSentMessageTemplate;
use App\Model\Message;
use App\Model\MessageTemplate;
use App\Model\PointHistory;
use App\Model\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Common{
    public static function dateFormat($value, $format = "d-M-Y H:i"){
        return Carbon::parse($value)->addHours(7)->format($format);
    }
    public static function dateFormatText($value, $format = "d-M-Y H:i"){
        $today = date("d-M-Y");
        $another_date = Carbon::parse($value)->addHours(7);

        $days = (strtotime($today) - strtotime($another_date->format('d-M-Y')))/ (60 * 60 * 24);

        $dateMain = $another_date->format($format);
        if ($days == 0) {
            $date = "Today".' <span>'.$another_date->format('H:i').'</span>';
        } else if($days == 1){
            $date = "Yesterday".' <span>'.$another_date->format('H:i').'</span>';
        } else {
            $date = $dateMain;
        }
        return $date;
    }


    public static function colorStatus($status = 0){
        $color = '';
        switch ($status){
            case 1:
                $color = '#367fa9';//call
                break;
            case 2:
                $color = '#e08e0b';//quote
                break;
            case 3:
                $color = '#00a65a';//win
                break;
            case 4:
                $color = '#d73925';//lost
                break;
            default:
                $color = '#00c0ef';//new
                break;

        }
        return $color;
    }
    public static function showColorStatus($statusID){
        $name = '';
        switch ($statusID){
            case 0:
                $name = 'label-new';
                break;
            case 1:
                $name = 'label-call';
                break;
            case 2:
                $name = 'label-quote';
                break;
            case 3:
                $name = 'label-win';
                break;
            case 4:
                $name = 'label-lost';
                break;
        }
        return $name;
    }
    public static function showNameStatus($statusID){
        $name = '';
        switch ($statusID){
            case 0:
                $name = 'New';
                break;
            case 1:
                $name = 'Call';
                break;
            case 2:
                $name = 'Quote';
                break;
            case 3:
                $name = 'Win';
                break;
            case 4:
                $name = 'Lost';
                break;
        }
        return $name;
    }

    public static function showGender($gender){
        $name = '';
        switch ($gender){
            case 0:
                $name = 'Male';
                break;
            case 1:
                $name = 'Female';
                break;
        }
        return $name;
    }

    public static function getAmountMessageInbox(){
        $auth = Auth::user();
        $amount = Message::countMessageInbox($auth->id, 10000);
        return $amount;
    }
    public static function getAmountNewMessage(){
        $auth = Auth::user();
        $messages = Message::countYetNotRead($auth->id, 10000);
        $amount = $messages->total();
        if($amount > 9){
            $result = '9 +';
        }else{
            $result = $amount;
        }
        return $result;
    }

    public static function getAllNewMessage(){
        $auth = Auth::user();
        $messages = Message::countYetNotRead($auth->id, 10);
        foreach ($messages as $message){
            $message['senderAvatar'] = User::getUserByID($message->author)->avatar;
            $message['senderUsername'] = User::getUserByID($message->author)->username;
        }
        return $messages;
    }

    public static function getAmountSentMessage(){
        $auth = Auth::user();
        $messages = Message::getMessageSent($auth->id);
        return $messages->total();
    }

    public static function getAmountDeletedMessage(){
        $auth = Auth::user();
        $messages = count(Message::getAllMessageDeleted($auth->id));
        return $messages;
    }

    public static function showTextLanguage($key){
        $text = '';
        switch ($key){
            case 'vn':
                $text = 'Vietnam';
                break;
            case 'en':
                $text = 'English';
                break;
        }
        return $text;
    }

    /*---------------------------------------------------------------------------
     * Function send email when lead changed status
     * Parameter:
     *  $status: new/call/quote/win/lost; default is: new
     *  $tipster_id
     *  $lead_id
     *  $product_id
     *  $points_new: Points plussed after lead of tipster change status to win
     *  $points_current: Total points of tipster
     * -------------------------------------------------------------------------*/
    public static function sendMailChangeStatus($status, $tipster_id = 1, $lead_id = 1, $product_id = 1, $points_new = 0){
        $call = Utils::$lead_process_status_call;
        $quote = Utils::$lead_process_status_quote;
        $win = Utils::$lead_process_status_win;
        $lost = Utils::$lead_process_status_lost;
        $template = MessageTemplate::getTemplateByMessageID('thank_you_letter');
        $product = Product::getProductByID($product_id);
        $tipster = User::getUserByID($tipster_id);
        $lead = Lead::getLeadByID($lead_id);
        /*------------------------------
         * Check status of lead
         * -----------------------------*/
        if($status == 'ups'){
            //Update points
            $template = MessageTemplate::getTemplateByMessageID('update_points_tipster');
        }
        if($status == 'pps'){
            //Add points
            $template = MessageTemplate::getTemplateByMessageID('plus_points_tipster');
        }

        if($status == $call){
            // Is "Call"
            $template = MessageTemplate::getTemplateByMessageID('update_lead_call');
        }
        if($status == $quote){
            //Is "Quote"
            $template = MessageTemplate::getTemplateByMessageID('update_lead_quote');
        }
        if($status == $win){
            //Is "Win"
            $template = MessageTemplate::getTemplateByMessageID('update_lead_win');
        }
        if($status == $lost){
            //Is "Lost"
            $template = MessageTemplate::getTemplateByMessageID('update_lead_lost');
        }

        if($points_new <= 0){
            $points_new = PointHistory::getPointByTipsterIDLeadID($tipster_id, $lead_id);
        }
        $tipster_name = "";
        if(isset($tipster)){
            $tipster_name = $tipster->fullname;
            $points_current = $tipster->point;
        }

        /*------------------------------------------------------
         * Check Preferred Language to set title & content consistent
         ------------------------------------------------------ */
        if($tipster->preferred_lang == 'vn'){
            $title = $template->subject_vn;
            $content = $template->content_vn;
        }else{
            $title = $template->subject_en;
            $content = $template->content_en;
        }
        $lead_name = "";
        if(asset($lead)){
            $lead_name = $lead->fullname;
        }
        $product_name = "";
        if(asset($product)){
            $product_name = $product->name;
        }

        $data['title'] = $title;
        $keys = ([
            'tipster.name' => $tipster_name,
            'lead.name' => $lead_name,
            'product.name' => $product_name,
            'points.new' => $points_new,
            'points.current' => $points_current,
        ]);


        foreach ($keys as $key=> $value){
            $content = str_replace('['.$key.']', $value, $content);
        }
        $data['body'] = $content;
        $emailTo = $tipster->email;
        $subjectTo = $title;

        $logs['sender_id'] = 0;
        $logs['receiver_id'] = $tipster_id;
        $logs['message_id'] = $template->message_id;
        $logs['subject'] = $title;
        $logs['content'] = $content;
        LogsSentMessageTemplate::create($logs);

        return Mail::send('messagetemplates.emails.email', $data, function($message) use ($emailTo, $subjectTo, $tipster_name) {

            $message->to($emailTo, $tipster_name)
                ->subject($subjectTo);

        });
    }

    public static function saveLogsSentMessage($sender_id, $receiver_id, $message_id, $subject, $content){
        $logs['sender_id'] = $sender_id;
        $logs['receiver_id'] = $receiver_id;
        $logs['message_id'] = $message_id;
        $logs['subject'] = $subject;
        $logs['content'] = $content;
        return LogsSentMessageTemplate::create($logs);
    }
}