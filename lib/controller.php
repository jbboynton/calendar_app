<?php

/**
 *
 */
class Controller {
  protected $model;
  protected $view;

  function __construct() {

    // check session info here
    // Create a new instance of the corresponding view.
    $this->view = new View();
    // $this->session = new Session();    // Sessions still not working.
  }

  /* Loading a model automatically if the corresponding controller is
  * called. */
  public function loadModel($name) {
    echo "new view was called";
    $path = MODELS_PATH . DS . $name . '_model.php';

    if (file_exists($path)) {
      require MODELS_PATH . DS . $name . '_model.php';
      $modelName = $name . '_Model';
      $this->model = new $modelName();
    }
  }
}


?>
