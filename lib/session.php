<?php

/**
 *
 */
class Session {

  public $tokenId;
  private $loggedIn;

  public function __construct() {
    session_start();    
    echo 'trying to init a sessiion';
    $this->checkIfLoggedIn();
  }

  static public function getLoggedIn() {
    return $this->loggedIn;
  }

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

  private function checkIfLoggedIn() {
    if (isset($_SESSION['tokenId'])) {
      $this->tokenId = $_SESSION['tokenId'];
      $this->loggedIn = true;
    } else {
      unset($this->tokenId);  // Maybe call destroy() on this?
      $this->loggedIn = false;
    }
  }

  // public static function start() {
  //   session_start();
  // }
  //
  // public static function stop() {
  //   session_destroy();
  // }
  //
  // public static function set($key=0, $value=0) {
  //   $_SESSION[$key] = $value;
  // }
  //
  // public static function get(){
  //   return $_SESSION[$key];
  // }
}


?>
