<?php

/**
 * Includes the necessary headers and footers that compose the majority of the
 * page template, as well as the look and feel.  Currently it's just a simple
 * Twitter Bootstrap theme, but it can be tweaked significantly.  Prof. Mowry
 * liked the dropdown menus and tabbed design; it seems to mirror the software
 * he uses in the lab.
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
