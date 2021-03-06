<?php

/**
 * Not going to be used anymore -- swapping out MySQLi for the PDO class.
 * Consider this all to be defunct.
 */
class Database {

  function __construct() {
    $this->open();
  }

  public function open() {
    $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
      OR die('Could not connect to MySQL: ' . mysqli_connect_error());
      // TODO: error handling
  }

  /*
   * close function
   * Closes a connection to the database.  If a connection is open, it is
   * closed, and the variable is destroyed.
   */
  public function close() {
    if (isset($this->db)) {
      mysqli_close($this->db);
      unset($this->db);
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
  // public function query($sql) {
  //   $result = mysqli_query($this->db, $sql);
  //   $this->confirmQuery($result);
  //
  //   return $result;
  // }

  /*
   * affected_rows function
   * Returns the number of rows affected by the last query.
   * @return The number of affected rows.
   */
  public function affectedRows() {
    return $this->affected_rows;
  }

  /*
   * fetch_array function
   * Returns an array containing the result of an SQL query.
   * TODO: error handling?
   * @param $result The result of an SQL query.
   * @return The array containing the result set.
   */
  public function fetchArray($result) {
    $set = mysqli_fetch_array($result);
    // mysqli_free_result($result);
    return $set;
  }

  // public function prepare($sql) {
  //     mysqli_prepare($sql);
  // }

  /*
   * escapeData function
   * Used to escape and/or strip characters that should not be passed to the
   * database.
   * @param $data The string to escape.
   * @return The clean string.
   */
  public function escapeData($data) {
    $data = mysqli_real_escape_string($this->db, $data);
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
      die('Bad query: ' . mysqli_connect_error());
      // TODO: error handling
    }
  }
}


?>
