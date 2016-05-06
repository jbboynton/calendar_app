<?php

/*
 * init.php
 * Define paths and other globals, and require any necessary files.
 */

/**
 * PATH DEFINITIONS
 * Define paths to commonly referenced files and directories.
 *
 * DS               : Redefinition of the built-in PHP directory separator
 * SITE_ROOT        : Relative path to the root of the website
 * ABS_PATH         : Absolute path to the root directory
 *
 * CONFIG_PATH      : Configuration files for the site and database
 *
 * LIB_PATH         : Core files and parent classes
 * CONTROLLERS_PATH : Classes that link together the models and views
 * MODELS_PATH      : Encapsulate data and functionality specific to one entity
 * VIEWS_PATH       : Output and UI
 *
 * PUBLIC_PATH      : CSS, JS, and jQuery files
 * CSS_PATH         : Stylesheets
 * JS_PATH          : JS and jQuery files
 */

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("SITE_ROOT") ? null : define("SITE_ROOT", DS . "var" . DS . "www" . DS . "calendar");
defined("ABS_PATH") ? null : define("ABS_PATH", "http://dev/");
defined("CONFIG_PATH") ? null : define("CONFIG_PATH", SITE_ROOT . DS . "config");
defined("LIB_PATH") ? null : define("LIB_PATH", SITE_ROOT . DS . "lib");
defined("CONTROLLERS_PATH") ? null : define("CONTROLLERS_PATH", SITE_ROOT . DS . "controllers");
defined("MODELS_PATH") ? null : define("MODELS_PATH", SITE_ROOT .  DS . "models");
defined("VIEWS_PATH") ? null : define("VIEWS_PATH", SITE_ROOT . DS . "views");
defined("PUBLIC_PATH") ? null : define("PUBLIC_PATH", SITE_ROOT . DS . "public");
defined("CSS_PATH") ? null : define("CSS_PATH", PUBLIC_PATH . DS . "css");
defined("JS_PATH") ? null : define("JS_PATH", PUBLIC_PATH . DS . "js");


/* Require essential library files */
require_once(LIB_PATH . DS . "app.php");
require_once(LIB_PATH . DS . "controller.php");
require_once(LIB_PATH . DS . "model.php");
require_once(LIB_PATH . DS . "view.php");

require_once(CONFIG_PATH . DS . "config.php");
require_once(LIB_PATH . DS . "database.php");
// require_once(LIB_PATH . DS . "session.php");

/* Require the database config file. */
// require_once(CONFIG_PATH . DS . "config.php")

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
