<?php

/*
 * Controller.php
 * TODO comment
 */

class Controller {

  /*
   * TODO: comment
   */
  protected function model($model) {

    /* check if model exists */
    if (file_exists(MODELS_PATH . DS . $model . ".php")) {

      /* require in the model */
      require_once(MODELS_PATH . DS . $model . ".php");

    // /* If model doesn't exist... */
    } else { //require_once(the default model I guess?) }
      echo "Model doesn't exist";
    }

    return new $model;
  }

  /*
   * TODO: comment
   */
  public function view($view, $data) {

    /* don't need this??? --- check if view exists */
    // if (file_exists(VIEWS_PATH . DS . $view . ".php")) {

      /* require in the model */
      require_once(MODELS_PATH . DS . $view . ".php");

    // /* don't need this??? --- If view doesn't exist... */
    // } else { require_once(the default view I guess?) }

    // don't need this??? --- return new $view;

  }

}

?>
