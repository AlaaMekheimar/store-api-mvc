<?php
 
namespace MVC\models;

use MVC\core\Model;

use Exception;

class UserModel extends Model{
        
        function register($data){
                   try{ 
                        
                        parent::connection()->insert('customer',$data);
      
                        return 1;

                    }catch(Exception){
          
                        return 0;

                    }
       }//end register

       function login($email, $password){

            $db= parent::connection()->row("SELECT * FROM customer WHERE email = ? AND password = ?", [$email,$password]);
            return $db;

        }//end login

    

    
}//end class user model