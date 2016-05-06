<?php

/**
 *
 */
class View {

  function __construct() { }

  public function render($name='')  {
    require_once VIEWS_PATH . DS . 'header.php';
    require_once VIEWS_PATH . DS . 'admin_navbar.php';
    require_once VIEWS_PATH . DS . $name . '.php';
    require_once VIEWS_PATH . DS . 'footer.php';
  }

}




?>
