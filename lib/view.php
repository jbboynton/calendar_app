<?php

/**
 *
 */
class View {

  function __construct() { }

  public function render($name='')  {
    require VIEWS_PATH . DS . 'header.php';
    require VIEWS_PATH . DS . 'admin_navbar.php';
    require VIEWS_PATH . DS . $name . '.php';
    require VIEWS_PATH . DS . 'footer.php';
  }

}




?>
