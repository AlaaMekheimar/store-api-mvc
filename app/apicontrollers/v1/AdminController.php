<?php

namespace MVC\apicontrollers\v1;

use MVC\core\Helper;

use MVC\models\AdminModel;

class AdminController{
    
    private $objAdminModel;

    function __construct()
    {

        $this->objAdminModel = new AdminModel;
        Helper::dataRespose();

    }//end construct

    function login(){
               
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            Helper::typeMethod('GET');

            $data = Helper::getData();
          
            $data =$this->objAdminModel->login($data['email'],$data['password']);
            
            Helper::returnData(200,$data);

        }else{
             
            Helper::callMethodError();

        }    

     }//end login

}//end class UserController
