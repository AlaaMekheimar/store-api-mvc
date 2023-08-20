<?php

namespace MVC\core;

use MVC\core\Response;

use MVC\apicontrollers\error\Error;

class Helper{
      
     static function dataRespose(){

               header('Access-Control-Allow_Origin: application/json');

               header('Content-Type: application/json');  

     }//end dataResponse

     static function typeMethod($method){

               header('Access-Control-Allow-Method: '.$method);

     }//end typeMethod

     static function getData(){

               $data = file_get_contents("php://input");

               return json_decode($data,true);

     }//end getData

     static function checkDataBaseChange($check, $statusCode, $action){

          
          if($check){
            
               Response::responseMessage($statusCode,$action);
     
         }else{

               Response::responseMessage(300,"not change");  

         }

     }//end checkDataBaseChange

     static function callMethodError(){
             
               $instanceError = new Error();     

               $instanceError->errorInMethod();
    
     }//end callFunctionMethodError 

     static function returnData($statusCode,$data){
           
          if(!empty($data)){
               
               Response::responseMessage($statusCode,$data);

          }else{

               Response::responseMessage(300,"not selected"); 

          }
            
     }//end returnData

}//end Helper