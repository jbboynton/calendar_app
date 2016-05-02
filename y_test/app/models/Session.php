<?php

/*
 * Session.php
 * This class handles sessions.
 */
class Session {

  /* == FIELDS ============================================================= */

  private $email;                // Uniquely identifies a user
  private $logged_in = false;    // Flag, set to true when the user logs in


  /* == CONSTRUCTOR ======================================================== */

  /*
   * Constructor
   * Starts a new session.
   */
  public function __construct() {
    session_start();
    $this->checkLoggedIn();
  }

  /* == STATIC METHODS ===================================================== */


  /* == INSTANCE METHODS =================================================== */

  /*
   * getLoggedIn function
   * Returns the value stored in the logged_in field.
   * @return True if logged in, false if not.
   */
  public function getLoggedIn() {
    return $this->logged_in;
  }

  /*
   * login function
   * Logs a user into the system.
   * @param $user The user to be logged in.
   */
  public function login($user) {
    if ($user) {
      $this->user_email = $user->getEmail();
      $_SESSION['user_email'] = $user->getEmail();
      $this->logged_in = true;
    }
  }

  /*
   * logout function
   * Logs the user out.
   */
  public function logout() {
    unset($_SESSION['user_email']);
    unset($this->user_email);
    $this->logged_in = false;
    // session_destroy();
  }

  /*
   * checkLoggedIn function
   * Determines if a user is logged in by checking if the user's email address
   * has been set in the $_SESSION global.  If it has been set, ???????????, and sets loggen_in to true.  If not, it unsets ????email????? and sets logged_in to false.
   */
  private function checkLoggedIn() {
    if(isset($_SESSION['user_email'])) {
      $this->user_email = $_SESSION['user_email'];
      $this->logged_in = true;
    } else {
      unset($this->user_email);
      $this->logged_in = false;
    }
  }
}

$session = new Session();

?>
