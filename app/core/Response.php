<?php

namespace MVC\core;

class Response{

    static function responseMessage($status,$data){
 
        http_response_code($status);
     
        $arrayResponse = [
 
             "status" => $status,
             "message"=>$data

       ]; 

       $dataResponse=json_encode($arrayResponse); 

       echo $dataResponse; 

     }//end responseMessage
     

}//end class Response