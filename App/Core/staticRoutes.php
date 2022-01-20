<?php
namespace App\Core;

class StaticRoutes{

  public function get(){
    return [
      '/tasks' => [
        'controller' => 'App\Controllers\taskController',
        'action' => 'getAllTasks',
        'template' => 'App\Views\Templates\json.php'
      ],
      '/admin/task/get' => [
        'controller' => 'App\Controllers\taskController',
        'action' => 'getTask',
        'template' => 'App\Views\Templates\json.php'
      ],
      '/' => [
        'controller' => 'App\Controllers\taskController',
        'action' => 'getPages',
        'template' => 'App\Views\Templates\User\tasks.html'
      ],
      '/admin' => [
        'controller' => 'App\Controllers\taskController',
        'action' => 'getAdminPages',
        'template' => 'App\Views\Templates\Admin\tasks.html'
      ],
      '/login' => [
        'controller' => 'App\Controllers\userController',
        'action' => 'loginForm',
        'template' => 'App\Views\Templates\Admin\login.html'
      ],
      '/logout' => [
        'controller' => 'App\Controllers\userController',
        'action' => 'logout',
        'template' => 'App\Views\Templates\Admin\login.html'
      ],
    ];
  }

  public function post(){
    return [
      '/task/insert' => [
        'controller' => 'App\Controllers\taskController',
        'action' => 'insertTask',
        'template' => 'App\Views\Templates\json.php'
      ],
      '/admin/task/update' => [
        'controller' => 'App\Controllers\taskController',
        'action' => 'updateTask',
        'template' => 'App\Views\Templates\json.php'
      ],
      '/login' => [
        'controller' => 'App\Controllers\userController',
        'action' => 'login',
        'template' =>'App\Views\Templates\Admin\login.html',
      ],
    ];
  }


}

?>
