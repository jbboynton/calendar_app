<?php

/**
 *
 */
class Options extends Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->view->msg = "<br />options/index<br />";
    $this->view->render('options/index');
  }

  public function account() {
    $this->view->msg = "<br />change your account options<br />";
    $this->view->render('options/account');
  }

  public function calendar() {
    $this->view->msg = "<br />change your calendar options<br />";
    $this->view->render('options/calendar');
  }
}


?>
