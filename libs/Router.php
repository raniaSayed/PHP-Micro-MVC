<?php
/**
 * Router Class
 */
class Router
{

  public static function run(){
    $controller = null;
    if(isset($_GET["cntrl"]) && !empty($_GET["cntrl"])){

      if(is_readable(CONTROLLERS_DIR.DS.$controller."Controller.php")){

        //$controller_name = ucwords($_GET['cntrl']);
        $controller_name  = $_GET["cntrl"];
        $controller = new $controller_name();
      }else{
        // $home = HOME_CONTROLLER;
        // $controller = new $home();
        $controller = new HOME_CONTROLLER();
      }
      //check action

    }

  }
}


 ?>
