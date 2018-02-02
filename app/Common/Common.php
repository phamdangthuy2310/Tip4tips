<?php
namespace App\Common;

use Carbon\Carbon;

class Common{
    public static function dateFormat($value, $format = "d-M-Y H:i"){
        return Carbon::parse($value)->addHours(7)->format($format);
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
}