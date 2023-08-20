<?php

namespace MVC\apicontrollers\v1;

use MVC\core\Helper;

use MVC\models\UserModel;

class UserController{
    
    private $objUserModel;

    function __construct()
    {

        $this->objUserModel = new UserModel;
        Helper::dataRespose();

    }//end construct
    
    function register(){

            if($_SERVER['REQUEST_METHOD']=='POST'){

                Helper::typeMethod('POST');
                
                $data = Helper::getData();
          
                $res = $this->objUserModel->register($data);
               
                Helper::checkDataBaseChange($res, 200, "user insered");

            }else{
                
                Helper::callMethodError();
                
            }

    }//end register

    function login(){
               
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            Helper::typeMethod('GET');

            $data = Helper::getData();
          
            $data =$this->objUserModel->login($data['email'],$data['password']);
            
            Helper::returnData(200,$data);

        }else{
             
            Helper::callMethodError();

        }    

     


    }//end login

}//end class UserController

