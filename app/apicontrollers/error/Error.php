<?php

namespace MVC\apicontrollers\error;

use MVC\core\Helper;

use MVC\core\Response;

class Error{
     
    function __construct()
    {

        Helper::dataRespose();

    }//end construct

    function errorInMethod(){

        Response::responseMessage(300,"error in http request method");   

    }//end errorInMethod
}