<?php

/**
 * config.php
 * This file defines constants used to connect to the MySQL database.  Edit: it
 * no longer does this.  In fact, it defines constants that the new PDO
 * database class can't seem to use.
 */

  /* Globals for MySQL */
  DEFINE ('DB_USER', 'db_user');
  DEFINE ('DB_PASSWORD', 'password');
  DEFINE ('DB_HOST', 'localhost');
  DEFINE ('DB_NAME', 'calendar_app');

?>
