<?php

require_once(require_once("../../inc/init.php"));

/*
 * home.php
 * default home controller, called when no controller/method has been passed
 * to the app.
 */

class Home extends Controller {

  // initialize the user and username

  // initialize the view

  /*
   * TODO: comment
   */
  public function index() {

    // $user = $this->model("$name");
    // $user->name = $name;
    // echo $user->name;
    // blah blah blah etc.

    $this->view('rel/path/to/the/view', ["array-of-parameters"]);

  }




}


)

?>
