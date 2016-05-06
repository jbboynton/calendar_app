<?php

/**
 * database.php
 * The replacement for MySQLi.  Hopefully, the PDO class will lend itself to
 * object-oriented programming better than MySQLi.  This class is meant to hook
 * into the Model superclass (lib/model.php).  Building the database class into
 * the Model class will, in theory, make database accessibility relatively
 * easy.
 */

class Database extends PDO {

  public function __construct() {
    /* The database constants defined in config/config.php don't seem to work
     * here, like they did in the MySQLi database class. */
     
    // parent::__construct('mysql:host='.DB_HOST.';dbname='.DB_NAME.', '.DB_USER.', '.DB_PASSWORD);

    parent::__construct('mysql:host=localhost;dbname=calendar_app', 'root', '');
  }

}

?>
