<?php

/**
 *
 */
class Calendar extends Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->view->msg = 'Your calendar goes here';
    $this->view->render('calendar/index');
  }
}



?>
