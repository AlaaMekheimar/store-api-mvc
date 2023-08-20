<?php
 
namespace MVC\models;

use MVC\core\Model;

use Exception;

class CategoryModel extends Model{

      function insertCategory($data){
        try{ 
                        
            parent::connection()->insert('categorey',$data);
      
            return 1;

      }catch(Exception){
          
            return 0;

      }
 
     }//end insertCategory

     public function selectAllCategory() {

        $db = parent::connection()->rows("SELECT * FROM categorey");

        return $db;

    }//end selectAllCategory

    public function selectCategoryById($id) {

        $db = parent::connection()->row("SELECT * FROM categorey WHERE id = ? ", [$id]);

        return $db;

    }//end selectCategoryById

 
     public function updateCategory($data,$id){

        $db = parent::connection()->update('categorey', $data , ['id' => $id]);

        return $db;

     }//end update


     public function deleteCategory($id) {
        
            $db = parent::connection(); 
        
            $items = $db->rows("SELECT * FROM item WHERE cat_id = ?", [$id]);
            
            foreach ($items as $item) {
               
                $db->delete('orders', ['item_id' => $item->id]);
            }
            
          
            $db->delete('item', ['cat_id' => $id]);
            

          return $db->deleteById('categorey', $id);
        
        
        
 
    }//end deleteCategory 

}//end class