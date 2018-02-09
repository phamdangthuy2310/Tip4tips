<?php
namespace App\Common;
use App\Model\Lead;

/**
 * Created by PhpStorm.
 * User: User
 * Date: 031, 31-1-2018
 * Time: 22:37
 */

class Utils{
    //Status id for win
    public static $lead_process_status_win = "3";
    //-----Start Log Activity---------
    //affected object history
    public static $LOG_AFFECTED_OBJECT_LEAD = "Lead";
    public static $LOG_AFFECTED_OBJECT_TIPSTER = "Tipster";
    public static $LOG_AFFECTED_OBJECT_USER = "User";
    public static $LOG_AFFECTED_OBJECT_CONSULTANT = "Consultant";
    public static $LOG_AFFECTED_OBJECT_SALE_MANAGER = "Sale Manager";
    public static $LOG_AFFECTED_OBJECT_COMMUNITY_MANAGER = "Community Manager";
    public static $LOG_AFFECTED_OBJECT_PRODUCT = "Product";
    public static $LOG_AFFECTED_OBJECT_GIFT = "Gift";
    public static $LOG_AFFECTED_OBJECT_Message = "Message";

    //action history
    public static $LOG_ACTION_CREATE = "created";
    public static $LOG_ACTION_UPDATE = "update";
    public static $LOG_ACTION_DELETE = "delete";
    public static $LOG_ACTION_UPDATE_POINT = "update points for";
    public static $LOG_ACTION_SEND = "send";
    //------End Log Activity--------
}