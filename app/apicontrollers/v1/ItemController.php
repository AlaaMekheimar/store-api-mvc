<?php

namespace MVC\apicontrollers\v1;

use MVC\core\Helper;

use MVC\models\ItemModel;

class ItemController{

    private $objItemModel;

    function __construct()
    {

        $this->objItemModel = new ItemModel;
        Helper::dataRespose();

    }//end construct

    function addItem(){
       
        if($_SERVER['REQUEST_METHOD']=='POST'){

            Helper::typeMethod('POST');
            
            $data = Helper::getData();

            $res=$this->objItemModel->insertItem($data);
            
            helper::checkDataBaseChange($res, 200,"Item inserted");

        }else{ 

            Helper::callMethodError();

        }
    }//end addItem

    function selectAllItem(){
      
        if($_SERVER['REQUEST_METHOD']=='GET'){

            Helper::typeMethod('GET');

            $data= $this->objItemModel->selectAllItem();
            
            helper::returnData(200, $data);

        }else{

            Helper::callMethodError();

        }
    }//end selectAllItem

    function selectItemById(){
      
        if($_SERVER['REQUEST_METHOD']=='GET'){
        
            Helper::typeMethod('GET');

            $data = Helper::getData();

            $data= $this->objItemModel->selectItemById($data['id']);
            
            helper::returnData(200, $data);

        }else{

            Helper::callMethodError();
            
        }

    }//end selectItemById

    function deleteItem(){
    
        if($_SERVER['REQUEST_METHOD']=='DELETE'){

            Helper::typeMethod('DELETE');

            $data = Helper::getData();
          
            $res= $this->objItemModel->deleteItem($data['id']);

            helper::checkDataBaseChange($res, 200,"Item deleted");

        }else{ 

            Helper::callMethodError();

        }

            
    }//end deleteItem


    function updateItem(){
       
        if($_SERVER['REQUEST_METHOD']=='PUT'){

            Helper::typeMethod('PUT');

            $data = Helper::getData();

            $res= $this->objItemModel->updateItem($data['item'],$data['id']);

            helper::checkDataBaseChange($res, 200,"Item updated");

        }else{ 

            Helper::callMethodError();

        }
    }//end updateItem

}