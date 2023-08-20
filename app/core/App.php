<?php

namespace MVC\core;

class App{

    private $api;
    private $version;
    private $controller;
    private $param=[];
    private $method;

    public function __construct() {
          $this->url();
          $this->render();
    }//end construct

    private function url(){
                if(!empty($_SERVER['QUERY_STRING'])){

                    $url= explode("/",$_SERVER['QUERY_STRING']);

                    $this->api= isset($url[0]) ? $url[0] : null;

                    $this->version= isset($url[1]) ? $url[1] : null;

                    $this->controller= isset($url[2]) ? $url[2]."controller" : null;

                    $this->method= isset($url[3]) ? $url[3] : null;

                    unset($url[0], $url[1], $url[2], $url[3]);

                    $this->param=array_values($url);
 

                }
    }//end url()

    private function render(){
        
               if($this->api==APICONTROLLER){
                     
                    if(file_exists(APICONTROLLERS.DS.$this->version)){

                        $this->controller= "MVC\apicontrollers\\".$this->version."\\".$this->controller;

                        if(class_exists($this->controller)){

                            $this->controller = new $this->controller;

                            if(method_exists($this->controller, $this->method)){

                                call_user_func_array([$this->controller, $this->method], $this->param);
                            }else{

                                echo "Error Method";

                            }

                        }else{

                            echo "Error Controller";

                        }

                    }else{
                          
                          echo "Error Version";
                    }

               }else{
                    
                    echo "Error Api";

               }

    }//end render()

}// end class app