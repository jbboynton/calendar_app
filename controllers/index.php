<?php

/**
 * The index controller.  This may be the source of some of the rendering
* issues when the "dev/" page is requested.  Needs more testing.
 */
class Index extends Controller {

  function __construct() {
    parent::__construct();
    $this->index();

    // $this->view->render('index/index');

  }

  public function index() {
    // $this->view->msg = "<br />we are in index<br />";
    $this->view->render('index/index');
  }
}


?>
