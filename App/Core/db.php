<?php

namespace App\Core;

class db{

protected $server;
protected $user;
protected $password;
protected $database;

public function __construct(){
  $this->server = 'localhost';
  $this->user = 'root';
  $this->password = '';
  $this->database = 'taskapp';
}


public function getConn(){
  $conn = mysqli_connect($this->server,$this->user,$this->password,$this->database);
  $conn->set_charset("utf8");
  return $conn;
}



}
?>
