<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 5/29/2018
 * Time: 12:40 PM
 */

class security
{
    public static function is_admin()
    {
        if(isset($_SESSION['is_admin']))
        {
            if ($_SESSION['is_admin'] != 1)
                return false;
            return true;
        }
    }
}
