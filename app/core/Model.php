<?php

namespace MVC\core;
use PDO;
use Dcblogdev\PdoWrapper\Database;

class Model{
     
     protected function connection(){
                    $options = [
                        'username' => USERNAME,
                        'database' => DBNAME,
                        'password' => PASSWORD,
                        'type' => TYPE,
                        'charset' => 'utf8',
                        'host' => HOST,
                        'port' => PORT
                    ];
    
                return new Database($options);

     }//end connection

     protected function con(){
    
        $username= USERNAME;
        $password=PASSWORD;
        $dbname=DBNAME;
        $host=HOST;
        $dns= ("mysql:host=$host;dbname=$dbname");
        return new PDO($dns,$username,$password);
    }      

}//end class 