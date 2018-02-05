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

    //action history
    public static $LOG_ACTION_CREATE = "Created";
    public static $LOG_ACTION_UPDATE = "Update";
    public static $LOG_ACTION_DELETE = "Delete";
    //------End Log Activity--------
}