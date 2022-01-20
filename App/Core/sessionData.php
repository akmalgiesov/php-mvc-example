<?php

namespace App\Core;

class sessionData{


  public function startSession(){
    session_start();
    $_SESSION['authorization'] = true;
  }

  public function destroySession(){
    session_start();
    $_SESSION['authorization'] = false;
  }

  public function checkSession(){
    session_start();
    return $_SESSION['authorization'] ? true:false;
  }


}



 ?>
