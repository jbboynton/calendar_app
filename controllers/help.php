<?php

/**
 * The help controller. Currently not very helpful.
 */
class Help extends Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->view->msg = 'In help/index';
    $this->view->render('help/index');
  }

  public function other($arg = false) {
    echo "<br />we are in other";
    echo "<br>optional: " . $arg;

    require 'models/help_model.php';
    $model = new Help_Model();
  }


}


?>
