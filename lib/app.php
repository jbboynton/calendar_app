<?php


/**
 * App.php
 * This class constructs a page when it is requested. When a page is requested,
 * the URL is redirected to "/index.php" (see  help/routing) and a new instance
 * of the App class is generated. The logic in the constructor determines what
 * page has been requested by parsing the $_GET array for the value associated
 * with the 'url' key. For more information, see help/routing. [TODO: Help
 * section for routing, URL rewriting, and .htaccess]
 */
class App {
  function __construct() {

    /* Find the 'url' key in the $_GET array, and store it in a variable. If
     * no 'url' key exists in the array, assume that the request was made for
     * the root directory of the site. */
    if (array_key_exists('url', $_GET)) {
      $url = $_GET['url'];
    } else {
      $url = 'index/index';
    }

    /* Sanitize the URL, and convert it to an array. */
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    // debug
    // print_r($url);

    /* Check if the a valid page wsa requested. The requested controller is
     * stored in $url[0]. If there isn't a valid match, load an error page. */
    $file = CONTROLLERS_PATH . DS . $url[0] . '.php';
    if (file_exists($file)) {
      require $file;
    } else {
      require CONTROLLERS_PATH . DS . 'error.php';
      $controller = new Error();
      // Prevents the rest of the page from executing -- fix this!
      return false;
    }

    /* Once the controller has been verified, create it.  Then, load the
     * corresponding model. */
    $controller = new $url[0];
    // $controller->loadModel($url[0]);    
    // $controller-loadSession();

    /* Once the controller has been created, decide what method needs to be
     * called, and if there are any parameters. First, check to see if any
     * parameters have been passed by checking if $url[2] has been set. (Any
     * parameters that have been passed will be stored in index 2.) If there
     * are parameters, call the method stored in index 1. (Any methods will
     * be stored in index 1.) If no parameters are specified, the controller's
     * method is called without parameters. Finally, if no method is specified,
     * the index method is called by default. */
    if (isset($url[2])) {
      $controller->{$url[1]}($url[2]);
    } elseif (isset($url[1])) {
      $controller->{$url[1]}();
    } else {
      $controller->index();
    }
  }
}

?>
