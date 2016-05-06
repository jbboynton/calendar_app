<?php

/**
 *
 */
class Index extends Controller {

  function __construct() {
    parent::__construct();

    $this->view->render('index/index');
  }

  public function index() {
    $this->view->msg = "<br />we are in index<br />";
    $this->view->render('index/index');
  }
}


?>
