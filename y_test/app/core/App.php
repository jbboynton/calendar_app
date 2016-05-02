<?php

/*
 * App.php
 * TODO comment
 */
class App {

  /*
   * PROPERTIES
   *
   * $controller : The controller, defaults to the "home" controller
   * $method     : The method, defaults to "index"
   * $parameters : Any parameters that will be passed to the method
   */
  protected $controller = "home";
  protected $method     = "index";
  protected $parameters = [ ];

  /*
   * TODO comment constructor
   */
  public function __construct() {

    $url = $this->parseURL();

    // check if the controller exists
    if (file_exists(CONTROLLERS_PATH . DS . $url[0] . '.php')) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    /* If the controller doesn't exist, TODO what is this doing */
    require_once(CONTROLLERS_PATH . DS . $this->controller . '.php');

    /* Create a new instance of the controller */
    $this->controller = new $this->controller;

    /* Check if a method exists now */
    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    /* if there are any parameters left over, pass them to the controller */
    $this->parameters = $url ? array_values($url) : [ ];

    /* call this wacky method to set this stuff */
    call_user_func_array([$this->controller, $this->method], $this->parameters);

  }

  /*
   * parseURL function
   * TODO comment
   */
  public function parseURL() {
    // check if url is set
    if (isset($_GET['url'])) {
      echo $_GET['url'];

      return $url = explode('/', filter_var(rtrim($_GET['url'], '/'),
        FILTER_SANITIZE_URL);
    }
  }

}

?>
