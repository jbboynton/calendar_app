<?php

/*
 * init.php
 * Define paths and other globals.
 */

/* Path definitions */
/* Define the DIRECTORY_SEPARATOR constant as DS */
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

/* Define path to the site root */
defined("SITE_ROOT") ? null : define("SITE_ROOT", DS . "var" . DS . "www" . DS . "html");

/* Define path to inc */
defined("LIB_PATH") ? null : define("LIB_PATH", SITE_ROOT . DS . "inc");

/* Files to include */

/* Config file loads first. */
require_once(LIB_PATH . DS . "config.php");

/* Functions load next, so that all subsequent files will have access  */
require_once(LIB_PATH . DS . "functions.php");

/* Load PHP core classes */
require_once(LIB_PATH . DS . "Session.php");
require_once(LIB_PATH . DS . "DatabaseObj.php");
require_once(LIB_PATH . DS . "Database.php");

/* Load database classes */
require_once(LIB_PATH . DS . "User.php");

?>
