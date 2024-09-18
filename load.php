<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require_once "Classes/RegistrationC.php";
//require_once "Classes/Dbconnection.php";
//require_once "Classes/Query.php";
//require_once "Classes/loginC.php";
//require_once "Classes/Profile.php";

function classAutoload($classname){
    $directory ="Classes";
    $filename = dirname(__FILE__).DIRECTORY_SEPARATOR .$directory .DIRECTORY_SEPARATOR .$classname .".php";
    if(file_exists($filename) AND is_readable($filename)){
        require_once $filename;
    }
}
 spl_autoload_register('classAutoload');

$regObj = new Registration();
$queryObj = new Query();
$logObj = new Login();

