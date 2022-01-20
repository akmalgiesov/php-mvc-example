<?php

namespace App\Models;

use App\Core\db;

class taskModel{

public function getAllTasks($page,$sortingField,$sortingType){

  $db = new db();
  $conn = $db->getConn();

  $limit = 3;
  $start = ($page * $limit) - $limit;

  $query = $conn->prepare('SELECT * FROM tasks ORDER BY '.$sortingField.' '.$sortingType.' LIMIT ?,?');
  $query->bind_param('ii',$start,$limit);
  $query->execute();
  $tasks = $query->get_result();

  while ($row = $tasks->fetch_assoc()) {
    $data[] = $row;
  }

  return $data;

}


public function getTask($id){

  $db = new db();
  $conn = $db->getConn();

  $query = $conn->prepare('SELECT * FROM tasks WHERE id = ?');
  $query->bind_param('i',$id);
  $query->execute();
  $tasks = $query->get_result();

  while ($row = $tasks->fetch_assoc()) {
    $data[] = $row;
  }

  return $data;

}


public function insertTask($fio,$mail,$taskText){

  $db = new db();
  $conn = $db->getConn();


  $query = $conn->prepare('INSERT INTO tasks (fio,mail,task,status,edited) VALUES (?,?,?,"Не выполнено","")');
  $query->bind_param('sss',$fio,$mail,$taskText);

  return $query->execute() ? true:false;

}


public function updateTask($id,$taskText,$status){

  $db = new db();
  $conn = $db->getConn();
  $conn->set_charset("utf8");

  $mark = "";

  $this->getTask($id)[0]['task'] != $taskText ? $mark = 'Изменено администратором' : $mark = "";

  $query = $conn->prepare('UPDATE tasks SET task = ?, status = ?, edited = ? WHERE id = ?');
  $query->bind_param('sssi',$taskText,$status,$mark,$id);

  return $query->execute() ? true:false;

}


public function getPages(){
  $db = new db();
  $conn = $db->getConn();
  $query = 'SELECT * FROM tasks';
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  $pages = ceil($count / 3);
  return $pages;
}


}



 ?>
