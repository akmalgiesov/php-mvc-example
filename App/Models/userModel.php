<?php

namespace App\Models;

use App\Core\Db;

class userModel{

  public function getUser($username,$password){
    $db = new Db();
    $conn = $db->getConn();

    $query = $conn->prepare('SELECT * FROM users WHERE username = ? AND password =?');
    $query->bind_param('ss',$username,$password);
    $query->execute();

    $count = mysqli_num_rows($query->get_result());

    return $count < 1 ? false:true;

    }

}



 ?>
