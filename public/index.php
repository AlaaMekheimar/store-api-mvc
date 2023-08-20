<?php

use MVC\core\App;

define("DS",DIRECTORY_SEPARATOR);
define("ROOT",dirname(__DIR__));

define("APP",ROOT.DS."app");
define("VENDOR",ROOT.DS."vendor");

define("APICONTROLLERS",APP.DS."apicontrollers");
define("MODELS",APP.DS."models");
define("CORE",APP.DS."core");

define("V1",APICONTROLLERS.DS."v1");

//db connection

define('HOST','localhost');
define('PORT','3306');

define('USERNAME','root');
define('PASSWORD','');

define('TYPE','mysql');
define('DBNAME','store');

//constant

define('APICONTROLLER','apicontrollers');

require_once VENDOR.DS."autoload.php";


$appobj= new App;