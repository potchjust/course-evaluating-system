<?php
/**
 * Created by IntelliJ IDEA.
 * User: Noblesse
 * Date: 17/09/2018
 * Time: 23:02
 */

namespace App;


class Session
{
    public function __construct()
    {
        if (session_status()===PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public function set($key,$value)
    {
        $_SESSION[$key]=$value;
    }

    public function get($key)
    {
        if (isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }

    }
    public function destroy($key)
    {
        unset($_SESSION[$key]);
    }
}