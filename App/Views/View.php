<?php

namespace App\Views;

class View{

public $template;

public function __construct($template){
  $this->template = $template;
}

public function render($data){
  return include($this->template);
}

}


 ?>
