<?php
namespace App\Common;

use App\Model\Message;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

}