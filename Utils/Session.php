<?php
   class Session{
    //setting session
  public function setsession($data){
     session_start();
     foreach($data as $key=>$value){
      return  $_SESSION[$key] =$value;
     }
     

  }
}



 