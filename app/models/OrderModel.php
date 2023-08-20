<?php
 
namespace MVC\models;

use MVC\core\Model;

use Exception;

class OrderModel extends Model{

    function insertOrder($data){

        try{ 
                        
            parent::connection()->insert('orders',$data);
      
            return 1;

      }catch(Exception){
          
            return 0;

      }
 
     }//end insertItem

     public function selectAllOrder() {

        $db = parent::connection()->rows("SELECT * FROM orders");

        return $db;

    }//end selectAllItem

    public function selectOrderById($id) {

        $db = parent::connection()->row("SELECT * FROM orders WHERE id = ? ", [$id]);

        return $db;

    }//end selectItemById

    public function selectOrderByCustomerId($id) {

        $db = parent::connection()->row("SELECT * FROM orders WHERE customer_id = ? ", [$id]);

        return $db;

    }//end selectItemById

    public function deleteOrder($id) {

        return parent::connection()->deleteById('orders',$id);

     }//end delete 
 
     public function updateOrder($data,$id){

        $db = parent::connection()->update('orders', $data , ['id' => $id]);

        return $db;

     }//end update

}