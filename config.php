<?php

//define gloabl constants
define("DB_NAME","lab1_php");
define("DB_SERVER","127.0.0.1");
define("DB_USERNAME","rania");
define("DB_PASSWORD","rania2017");
define("CWD",__DIR__);
define("DS",DIRECTORY_SEPARATOR);
define("PS",PATH_SEPARATOR);

//define gloabl directory names
define("CONTROLLERS_DIR",CWD.DS."controllers");
define("MODELS_DIR",CWD.DS."models");
define("LIBS_DIR",CWD.DS."libs");
define("VIEWS_DIR",CWD.DS."views");
define("HOME_CONTROLLER","Users");
define("SITE_URL","http://localhost/mvc/raniaMVC/");

//autoload functions

//set paths that autoload will search inside them
$path = get_include_path();
set_include_path($path.PS.CONTROLLERS_DIR.PS.MODELS_DIR.PS.LIBS_DIR);


//enable include classname with first character small or capital
function autoload($className)
{
  //capitalize first letter of class name
  require(ucwords($className."php"));
}
//reggister the default autoload function
spl_autoload_register("autoload");

$db = new Database();
//global connection
$conn = $db->conn;

Router::run();
