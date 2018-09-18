<?php
/**
 * Created by IntelliJ IDEA.
 * User: Noblesse
 * Date: 16/09/2018
 * Time: 20:18
 */

use App\Auth;
use App\Autoload;
use App\Database;
use App\Session;

require '../app/Autoload.php';

Autoload::init();

//initialisation des classes
$db=new Database('development_yearprize');
$session=new Session();
$auth=new Auth($db,$session);
//récupération de l'url
$url=$_SERVER['REQUEST_URI'];
//routing
if (!$auth->logged())
{
    require_once 'page de connexion';
}else{

}


