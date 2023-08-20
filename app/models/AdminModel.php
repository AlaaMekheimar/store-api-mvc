<?php
 
namespace MVC\models;

use MVC\core\Model;



class AdminModel extends Model{

       function login($email, $password){

            $db= parent::connection()->row("SELECT * FROM admin WHERE email = ? AND password = ?", [$email,$password]);
            return $db;

        }//end login

    

    
}//end class user model