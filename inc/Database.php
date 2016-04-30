<?php

require_once(LIB_PATH . DS . "config.php");

/*
 * Database.php
 * This class represents the MySQL database.
 */
class Database {

  /* == FIELDS ============================================================= */

  private $mysqli;    // MySQLi connection object

  /* == CONSTRUCTOR ======================================================== */

  /*
   * Constructor
   * Constructs an instance of the Database class.
   */
  public function __construct() {
    $this->open();
  }

  /* == INSTANCE METHODS =================================================== */

  /*
   * open function
   * Opens a connection to the database.  If unsuccessful, the connection is
   * closed, and an error is triggered.
   */
  public function open() {
    $this->mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
      OR die('Could not connect to MySQL: ' . mysqli_connect_error());
      // TODO: error handling
  }

  /*
   * close function
   * Closes a connection to the database.  If a connection is open, it is
   * closed, and the variable is destroyed.
   */
  public function close() {
    if (isset($this->mysqli)) {
      mysqli_close($this->mysqli);
      unset($this->mysqli);
    }
  }

  /*
   * query function
   * Performs a query on the database.  Checks that the query was successful
   * by calling the confirm_query function.  If successful, the result set of
   * the query is returned.
   * @param $sql The query string.
   * @return The result of the query.
   */
  public function query($sql) {
    $result = mysqli_query($this->mysqli, $sql);
    $this->confirmQuery($result);

    return $result;
  }

  /*
   * affected_rows function
   * Returns the number of rows affected by the last query.
   * @return The number of affected rows.
   */
  public function affectedRows() {
    return mysqli_affected_rows($this->mysqli);
  }

  /*
   * fetch_array function
   * Returns an array containing the result of an SQL query.
   * TODO: error handling?
   * @param $result The result of an SQL query.
   * @return The array containing the result set.
   */
  public function fetch_array($result) {
    return mysqli_fetch_array($result);
  }

  /*
   * escapeData function
   * Used to escape and/or strip characters that should not be passed to the
   * database.
   * @param $data The string to escape.
   * @return The clean string.
   */
  public function escapeData($data) {
    $data = mysqli_real_escape_string($this->mysqli, $data);
    $data = strip_tags($data);

    return $data;
  }

  /*
  * confirm_query function
  * Verifies that a query was executed by checking that a result set exists.
  * If the query did not produce a result set, an error is generated.
  * @param $set The result set of a query
  * @return The number of affected rows.
  */
  private function confirmQuery($result) {
    if (!$result) {
      die('Could not connect to MySQL: ' . mysqli_connect_error());
      // TODO: error handling
    }
  }
}

/* Create a new instance of the class. */
$db = new Database();

?>
