<?php

namespace App\Controllers;

use App\Models\userModel;
use App\Views\View;
use App\Core\sessionData;
use App\Core\parameters;

class userController{

public $template;

public function __construct($template){
  $this->template = $template;
}

public function loginForm(){

  $view = new View($this->template);
  return $view->render("");

}

public function login(){

  $parameters = new parameters();
  $parametersData = $parameters->getLoginParameters();

  $session = new sessionData();

  $message = 'Неверный логин и\или пароль!';

  $userModel = new userModel();

  if($userModel->getUser($parametersData['username'],$parametersData['password'])){
    $session->startSession();
    return header('Location:/admin');
  }else{
    $view = new View($this->template);
    return $view->render($message);
  }

}

public function logout(){
  $session = new sessionData();
  $session->destroySession();
  return header('Location:/login');
}






}


 ?>
