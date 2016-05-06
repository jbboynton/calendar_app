<?php

/**
 *
 */
class Model {

  /* A new instance of the database is created when the Model superclass
   * constructor is called. */
  function __construct() {
    $this->db = new Database();
  }

  /* Sessions not working at this point. */
  public function sessionInit() {
    $this->session = new Session();
  }
}


?>
