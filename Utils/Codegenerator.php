<?php
   class Codegenerator{

   public function generatecode(){
     $length =6;
    $characters ='abcdefghijklmnopqrstvuwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $code = '';
    for($i=0;$i<=$length;$i++){
   
        $code .=$characters[rand(0,strlen($characters)-1)];

    }

     return $code;


   }



   }
