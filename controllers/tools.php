<?php

/**
 *
 */
class Tools extends Controller {

  function __construct() {
    parent::__construct();
    echo "<br />we are in tools<br />";
  }

  public function index() {
    $this->view->msg = "<br />in tools/index controller<br />";
    $this->view->render('tools/index');
  }

  public function reporting() {
    $this->view->msg = "<br />view/generate reports<br />";
    $this->view->render('tools/reporting');
  }
}


?>
