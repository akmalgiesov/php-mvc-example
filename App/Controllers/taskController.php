<?php

namespace App\Controllers;

use App\Models\taskModel;
use App\Views\View;
use App\Core\sessionData;
use App\Core\parameters;

class taskController{

public $template;

public function __construct($template){
  $this->template = $template;
}

public function getAllTasks(){

  $parameters = new parameters();
  $parametersData = $parameters->getAllTasksParameters();


  $taskModel = new taskModel();
  $tasks = $taskModel->getAllTasks($parametersData['page'],$parametersData['sortingField'],$parametersData['sortingType']);

  $view = new View($this->template);
  return $view->render($tasks);

}

public function getTask(){

  $parameters = new parameters();
  $parametersData = $parameters->getTaskParameters();

  $taskModel = new taskModel();
  $task = $taskModel->getTask($parametersData['id']);

  $view = new View($this->template);
  return $view->render($task);

}

public function insertTask(){

  $parameters = new parameters();
  $parametersData = $parameters->getInsertTaskParameters();

  $taskModel = new taskModel();
  $result = $taskModel->insertTask($parametersData['fio'],$parametersData['mail'],$parametersData['taskText']);

  $result ? $message = "Данные успешно сохранены!": $message = "Ошибка при сохранении данных!";

  $view = new View($this->template);
  return $view->render($message);
}


public function updateTask(){

  $session = new sessionData();
  $view = new View($this->template);

  if($session->checkSession() == true){
    $parameters = new parameters();
    $parametersData = $parameters->getUpdateTaskParameters();

    $taskModel = new taskModel();
    $result = $taskModel->updateTask($parametersData['id'],$parametersData['taskText'],$parametersData['status']);

    $result ? $message = "Данные успешно обновлены!":'';

  }else{
    $message = "Выполните вход!";
  }

  return $view->render($message);

}


public function getPages(){
  $taskModel = new taskModel();
  $pages = $taskModel->getPages();

  $view = new View($this->template);
  return $view->render($pages);

}

public function getAdminPages(){

  $session = new sessionData();

  if ($session->checkSession() == true){
    $taskModel = new taskModel();
    $pages = $taskModel->getPages();

    $view = new View($this->template);

    return $view->render($pages);
  } else{
    return header('Location: /login');
  }



}



}


 ?>
