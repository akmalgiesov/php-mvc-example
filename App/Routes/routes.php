<?php
namespace App\Routes;

use App\Core\staticRoutes;

class routes{

public function goTo(){

  $method = strtolower($_SERVER['REQUEST_METHOD']);
  $url = explode('?',$_SERVER['REQUEST_URI']);

  $route = new staticRoutes();
  $routeParams = $route->$method()[$url[0]];

  $controllerName = $routeParams['controller'];
  $action = $routeParams['action'];
  $template = $routeParams['template'];

  $controller = new $controllerName($template);
  $controller->$action();

}

}

?>
