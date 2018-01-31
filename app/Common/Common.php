<?php
namespace App\Common;

use Carbon\Carbon;

class Common{
    public static function dateFormat($value, $format = "d-M-Y H:i"){
        return Carbon::parse($value)->addHours(7)->format($format);
    }

}