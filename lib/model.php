<?php

/**
 *
 */
class Model {

  function __construct() {
    $this->db = new Database();
  }

  public function sessionInit() {
    $this->session = new Session();    
  }
}


?>
