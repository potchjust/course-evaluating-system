<?php
/**
 * Created by IntelliJ IDEA.
 * User: Noblesse
 * Date: 16/09/2018
 * Time: 21:26
 */
namespace App;


class Autoload
{
        static function register($class)
        {
            $class=str_replace(__NAMESPACE__.'\\','',$class);
            $class=str_replace('\\','/',$class);
            require __DIR__.'/'.$class.'.php';
        }

        static function init()
        {
            spl_autoload_register([__CLASS__,'register']);
        }
}