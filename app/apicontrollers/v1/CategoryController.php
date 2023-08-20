<?php

namespace MVC\apicontrollers\v1;

use MVC\core\Helper;

use MVC\models\CategoryModel;

class CategoryController{

    private $objCategoryModel;

    function __construct()
    {

        $this->objCategoryModel = new CategoryModel;
        Helper::dataRespose();

    }//end construct

    function addCategory(){
  
        if($_SERVER['REQUEST_METHOD']=='POST'){

            Helper::typeMethod('POST');    
   
            $data = Helper::getData();    

            $res=$this->objCategoryModel->insertCategory($data);

            Helper::checkDataBaseChange($res,202,'data inserted in database');
            
        }else{
   
            Helper::callMethodError();

        }

    }//end addCategorey 

    function selectAllCategory(){
      
        if($_SERVER['REQUEST_METHOD']=='GET'){

            Helper::typeMethod('GET');

            $data= $this->objCategoryModel->selectAllCategory();
            
            helper::returnData(200, $data);

        }else{

            Helper::callMethodError();

        }
    }//end selectAllCategory

    function selectCategoryById(){
      
        if($_SERVER['REQUEST_METHOD']=='GET'){
        
            Helper::typeMethod('GET');

            $data = Helper::getData();

            $data= $this->objCategoryModel->selectCategoryById($data['id']);
            
            helper::returnData(200, $data);

        }else{

            Helper::callMethodError();
            
        }

    }//end selectCategoryById

    function deleteCategory(){
    
        if($_SERVER['REQUEST_METHOD']=='DELETE'){

            Helper::typeMethod('DELETE');

            $data = Helper::getData();
          
            $res= $this->objCategoryModel->deleteCategory($data['id']);
            

            helper::checkDataBaseChange($res, 200,"category deleted");

        }else{ 

            Helper::callMethodError();

        }

            
    }//end deleteCategory


    function updateCategory(){
       
        if($_SERVER['REQUEST_METHOD']=='PUT'){

            Helper::typeMethod('PUT');

            $data = Helper::getData();

            $res= $this->objCategoryModel->updateCategory($data['category'],$data['id']);

            helper::checkDataBaseChange($res, 200,"category updated");

        }else{ 

            Helper::callMethodError();

        }
    }//end updateCategory

}