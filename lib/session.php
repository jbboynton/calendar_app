<?php

/**
 * Problems with this class.  Currently, the structure of this program doesn't
 * match what I had envisioned -- since I'm so new to the PHP world, I've had to
 * follow a lot of templates and such, which has ultimately resulted in a design
 * that I don't really understand intuitively.  Any and all feedback is welcome.
 */
class Session {

  public $tokenId;
  private $loggedIn;

  /* Start sessions when the constructor is called */
  public function __construct() {
    session_start();
    echo 'trying to init a sessiion';
    $this->checkIfLoggedIn();
  }

  /* Currently not in use. Is a static function necessary here?  Not how I
   * planned it */
  static public function getLoggedIn() {
    return $this->loggedIn;
  }

  /* tokenId field isn't set, need to fix that logic */
  public function login($user) {
    echo 'got login';
    if($user) {
      $this->userId = $user->tokenId;
      $this->userId = $_SESSION['tokenId'];
    }
  }

  public function logout() {
    unset($_SESSION['tokenId']);
    unset($this->tokenId);
    $this->loggedIn = false;
  }

  /* tokenId field isn't set, need to fix that logic */
  private function checkIfLoggedIn() {
    if (isset($_SESSION['tokenId'])) {
      $this->tokenId = $_SESSION['tokenId'];
      $this->loggedIn = true;
    } else {
      unset($this->tokenId);  // Maybe call destroy() on this?
      $this->loggedIn = false;
    }
  }
}


?>
