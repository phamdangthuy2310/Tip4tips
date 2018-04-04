<?php
namespace App\Common;

class Utils{

    //Status id for lead status
    public static $lead_process_status_new = "0";
    public static $lead_process_status_call = "1";
    public static $lead_process_status_quote = "2";
    public static $lead_process_status_win = "3";
    public static $lead_process_status_lost = "4";
    public static $tipster_process_init = "5";
    public static $tipster_process_bonus = "6";
    public static $tipster_process_buy_gift = "7";
    public static $tipster_text_init = "Init";
    public static $tipster_text_bonus = "Bonus";
    public static $tipster_text_buy_gift = "Buy Gift";


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
    public static $LOG_AFFECTED_OBJECT_MESSAGE_TEMPLATE = "Message template";
    public static $LOG_AFFECTED_OBJECT_REGION = "Region";

    //action history
    public static $LOG_ACTION_CREATE = "created";
    public static $LOG_ACTION_UPDATE = "update";
    public static $LOG_ACTION_DELETE = "delete";
    public static $LOG_ACTION_UPDATE_POINT = "update points for";
    public static $LOG_ACTION_SEND = "send";
    //------End Log Activity--------

    //path image
    public static $PATH__IMAGE = "images/upload";
    //path default image
    public static $PATH__DEFAULT__IMAGE = "images/no_image_available.jpg";
    //path default avatar
    public static $PATH__DEFAULT__AVATAR = "images/no_image_available.jpg";

}