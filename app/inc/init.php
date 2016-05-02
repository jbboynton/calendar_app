<?php

/*
 * init.php
 * Define paths and other globals.
 */

/*
 * PATH DEFINITIONS
 * Define paths to commonly referenced files and directories.
 *
 * DS               : Redefinition of the built-in PHP directory separator
 * SITE_ROOT        : Path to the root of the website
 * CLASSES_PATH     : Path to the classes directory
 * CORE_PATH        : Path to the core directory
 * CONTROLLERS_PATH : Path to the controllers directory
 * MODELS_PATH      : Path to the models directory
 * VIEWS_PATH       : Path to the views directory
 */

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("SITE_ROOT") ? null : define("SITE_ROOT", DS . "var" . DS . "www" . DS .
  "html");
defined("CLASSES_PATH") ? null : define("CLASSES_PATH", SITE_ROOT . DS . "app" .
  DS . "classes");
defined("CORE_PATH") ? null : define("CORE_PATH", SITE_ROOT . DS . "app" . DS .
  "core");
defined("MODELS_PATH") ? null : define("MODELS_PATH", SITE_ROOT . DS . "app" .
  DS . "models");
defined("CONTROLLERS_PATH") ? null : define("CONTROLLERS_PATH", SITE_ROOT . DS .
  "app" . DS . "controllers");
defined("VIEWS_PATH") ? null : define("VIEWS_PATH", SITE_ROOT . DS . "app" .
  DS . "views");

/* Require the core files. */
require_once(CORE_PATH . DS . "App.php");
require_once(CORE_PATH . DS . "Controller.php");

/* Require the database config file. */
// require_once(CONFIG_PATH . DS . "config.php")


// /* Files to include */
// /* Config file loads first. */
// require_once(LIB_PATH . DS . "config.php");
//
// /* Functions load next, so that all subsequent files will have access  */
// require_once(LIB_PATH . DS . "functions.php");
//
// /* Load PHP core classes */
// require_once(LIB_PATH . DS . "Session.php");
// require_once(LIB_PATH . DS . "DatabaseObj.php");
// require_once(LIB_PATH . DS . "Database.php");
//
// /* Load database classes */
// require_once(LIB_PATH . DS . "User.php");

?>
