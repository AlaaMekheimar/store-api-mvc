<?php

namespace MVC\apicontrollers\v1;

use MVC\core\Helper;

use MVC\models\OrderModel;

class OrderController{

    private $objOrderModel;

    function __construct()
    {

        $this->objOrderModel = new OrderModel;
        Helper::dataRespose();

    }//end construct

    function addOrder(){
       
        if($_SERVER['REQUEST_METHOD']=='POST'){

            Helper::typeMethod('POST');
            
            $data = Helper::getData();

            $res=$this->objOrderModel->insertOrder($data);
            
            helper::checkDataBaseChange($res, 200,"Order inserted");

        }else{ 

            Helper::callMethodError();

        }
    }//end addOrder

    function selectAllOrder(){
      
        if($_SERVER['REQUEST_METHOD']=='GET'){

            Helper::typeMethod('GET');

            $data= $this->objOrderModel->selectAllOrder();
            
            helper::returnData(200, $data);

        }else{

            Helper::callMethodError();

        }
    }//end selectAllOrder

    function selectOrderById(){
      
        if($_SERVER['REQUEST_METHOD']=='GET'){
        
            Helper::typeMethod('GET');

            $data = Helper::getData();

            $data= $this->objOrderModel->selectOrderById($data['id']);
            
            helper::returnData(200, $data);

        }else{

            Helper::callMethodError();
            
        }

    }//end selectOrderById

    function selectOrderByCustomerId(){
      
        if($_SERVER['REQUEST_METHOD']=='GET'){
        
            Helper::typeMethod('GET');

            $data = Helper::getData();

            $data= $this->objOrderModel->selectOrderByCustomerId($data['customer_id']);
            
            helper::returnData(200, $data);

        }else{

            Helper::callMethodError();
            
        }

    }//end selectOrderByCustomerId

    function deleteOrder(){
    
        if($_SERVER['REQUEST_METHOD']=='DELETE'){

            Helper::typeMethod('DELETE');

            $data = Helper::getData();
          
            $res= $this->objOrderModel->deleteOrder($data['id']);

            helper::checkDataBaseChange($res, 200,"Order deleted");

        }else{ 

            Helper::callMethodError();

        }

            
    }//end deleteOrder


    function updateOrder(){
       
        if($_SERVER['REQUEST_METHOD']=='PUT'){

            Helper::typeMethod('PUT');

            $data = Helper::getData();

            $res= $this->objOrderModel->updateOrder($data['order'],$data['id']);

            helper::checkDataBaseChange($res, 200,"Order updated");

        }else{ 

            Helper::callMethodError();

        }
    }//end updateOrder

}