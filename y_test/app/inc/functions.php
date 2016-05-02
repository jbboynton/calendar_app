<?php

/*
 * function.php
 * This file defines commonly used global functions.
 */

/*
 * redirect_to function
 * Redirects the user to a given location.
 * @param $location The location to which the user will be redirected.
 */
function redirectTo($location = NULL) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

/*
 * include_template_helper function
 * Accepts a template file as an argument, and then runs the include command
 * so that the template gets dropped into the current page.
 * @param $template The template to be included.
 */
function include_template_helper($template) {
  include(SITE_ROOT . DS . "public" . DS . "layouts" . DS . $template);
}

/* Checks for valid entries for username, email, and name */
function checkData($candidate) {

  /* Call stripslashes and trim */
  $candidate = stripslashes($candidate);

  // Regex requirements
  $req1 = '%.{2}%';    // At least 2 lowercase letters

  if (preg_match($req1, $candidate)) { return true; }
  else { return false; }
}

/*
 * __autoload function
 * Checks to see if an undefined class exists.  If so, it will automatically
 * initialize it, else an error will be raised.
 * @param $class The class that needs to be initialized.
 */
function __autoload($class) {
  $path = ucfirst(strtolower($class));
  if (file_exists($path)) {
    require_once($path);
  } else {
    die("The class name could not be found.")
  }
}

/* ------------------------------------------------------------------------- *
 * Idea for stronger regex, where $flag is the type of data (e.g. email, pw,
 * username, etc.).  Note: avoid calling trim() on first and last names, so
 * that names with spaces keep the correct formatting.
 * ________________________________________________________________________ */
/* ---------------------------------------------------------------------------
  function strong_check_data($candidate, $flag) {

    // Regex requirements
    $req1 = '/^[A-Z]/';      // Uppercase
    $req2 = '/^[a-z]/';      // Lowercase
    $req3 = '/^[0-9]/';      // Numbers
    $req4 = '/^[.-_@ ]/';    // Symbols

    if (preg_match($req1, $candidate) &&
      preg_match($req2, $candidate) &&
      preg_match($req3, $candidate)) &&
      preg_match($req4, $candidate)) { return true; }
    else { return false; }
}
----------------------------------------------------------------------------*/

?>
