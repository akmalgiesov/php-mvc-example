<?php

namespace App\Core;

class parameters{

protected $replacement;

public function __construct(){
  $this->replacement = array('/','script','<','>');
}


public function getAllTasksParameters(){
  return [
    'page' => $_GET['page'],
    'sortingField' => $_GET['sortingField'],
    'sortingType' => $_GET['sortingType']
  ];
}

public function getTaskParameters(){
  return [
    'id' => $_GET['id']
  ];
}

public function getInsertTaskParameters(){
  return [
    'fio' => str_replace($this->replacement,'',$_POST['fio']),
    'mail' => str_replace($this->replacement,'',$_POST['mail']),
    'taskText' => str_replace($this->replacement,'',$_POST['taskText'])
  ];
}

public function getUpdateTaskParameters(){
  return [
    'id' => $_POST['id'],
    'taskText' => str_replace($this->replacement,'',$_POST['taskText']),
    'status' => str_replace($this->replacement,'',$_POST['status'])
  ];
}

public function getLoginParameters(){
  return [
    'username' => str_replace($this->replacement,'',$_POST['username']),
    'password' => str_replace($this->replacement,'',$_POST['password'])
  ];
}

}



 ?>
