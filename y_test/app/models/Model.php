<?php

require_once(CLASSES_PATH . DS . "Database.php");

/*
 * BaseModel.php
 * TODO comment
 */
abstract class Model {

  /* == FIELDS ============================================================= */

  protected $db;    // The database instance

  /* == CONSTRUCTOR ======================================================== */

  /*
   * Constructor
   * Constructs a user object.
   */
  public function __construct() {
    global $db;


  }

  /* == STATIC METHODS ===================================================== */


?>
