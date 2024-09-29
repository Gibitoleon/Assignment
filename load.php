<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;
 //loading required files
function classAutoload($classname){
    $directories =['Classes','Utils'];
    foreach($directories as $directory){
    $filename = dirname(__FILE__).DIRECTORY_SEPARATOR .$directory .DIRECTORY_SEPARATOR .$classname .".php";
    if(file_exists($filename) AND is_readable($filename)){
        require_once $filename;
    }
}
}
 spl_autoload_register('classAutoload');

 //loading the dotenv file
 
$dotenv = Dotenv::createImmutable(__DIR__ );
$dotenv->load();
 $username= $_ENV['EMAIL_USERNAME'];
 $password =$_ENV['EMAIL_PASSWORD'];

 
 
 
$regObj = new Registration();
$queryObj = new Query();
$logObj = new Login();
$verObj = new Verification();
//$mailObj = new Mail($username,$password);

$codeobj =new Codegenerator();


