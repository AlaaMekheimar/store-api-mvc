<?php
 
namespace MVC\models;

use MVC\core\Model;

use Exception;

class ItemModel extends Model{

    function insertItem($data){

        try{ 
                        
            parent::connection()->insert('item',$data);
      
            return 1;

      }catch(Exception){
          
            return 0;

      }
 
     }//end insertItem

     public function selectAllItem() {

        $db = parent::connection()->rows("SELECT * FROM item");

        return $db;

    }//end selectAllItem

    public function selectItemById($id) {

        $db = parent::connection()->row("SELECT * FROM item WHERE id = ? ", [$id]);

        return $db;

    }//end selectItemById

    public function deleteItem($id) {

        return parent::connection()->deleteById('item',$id);

     }//end delete 
 
     public function updateItem($data,$id){

        $db = parent::connection()->update('item', $data , ['id' => $id]);

        return $db;

     }//end update


     


}