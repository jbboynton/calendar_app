<?php

/**
 * Controller for the administrative "manage" tools.  This controller will
 * allow the admin to set global options, as well as to have access to the
 * other user accounts.  Currently non-functioning.
 */
class Manage extends Controller {

  function __construct() {
    parent::__construct();

  }

  public function index() {
    $this->view->msg = "<br />we are in manage<br />";
    $this->view->render('manage/index');
  }

  public function pending() {
    $this->view->msg = "<br />here are the events pending<br />";
    $this->view->render('manage/pending');
  }

  public function master() {
    $this->view->msg = "<br />manage master range settings here<br />";
    $this->view->render('manage/master');
  }

  public function accounts() {
    $this->view->msg = "<br />manage accounts here<br />";
    $this->view->render('manage/accounts');
  }

}


?>
