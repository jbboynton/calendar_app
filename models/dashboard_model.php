<?php

/**
 * The newest revision of this class.  Still needs (a lot) of work, but is much
 * more manageble than its predecessor.  Lacking most of its functionality.
 */
class Dashboard_Model extends Model {

  public function __construct() {
    parent::__construct();

  }

  // sha1 encryption is awful, needs to be upgraded to bcrypt(). see php password hash doc
  public function sign_in() {
    $stmt = $this->db->prepare("SELECT user_id FROM users WHERE user_email = :email AND user_password = SHA1(:password)");
    $stmt->execute(array(
      ':email'    => $_POST['email'],
      ':password' => $_POST['password']
    ));

    // $records = $stmt->fetchAll();

    // if there's one row affected, log in
    $rowsAffected = $stmt->rowCount();
    if ($rowsAffected == 1) {
      $this->sessionInit();
      header('location: index');
    } else {
      echo "<br>second dashboard";
      // show an error
      // write to log file
    }
  }

}


?>
