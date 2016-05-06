<?php

/**
 *
 */
class Dashboard_Model extends Model {

  function __construct() {
    parent::__construct();

    echo "in Dashboard_Model";
  }

  public function logUserIn() {
    echo "trying to log someone in";

    if (isset($_POST['submitted'])) {
      echo "<br>submitted has been posted";

      /* Verify email */
      if (stripslashes(trim($_POST['email']))) {
        $this->email = $this->db->escapeData($_POST['email']);
      } else {
        $this->email = false;
        $invalid_data[] = 'Email address';
      }

      /* Verify password */
      if (stripslashes(trim($_POST['password']))) {
        $this->pw = $this->db->escapeData($_POST['password']);
      } else {
        $this->pw = false;
        $invalid_data[] = 'Password';
      }

      if ($this->email && $this->pw) {

        $this->query = "SELECT user_id, user_type, user_email, user_password, user_fname, user_lname, user_org, user_active FROM users WHERE user_email='$this->email' AND user_password = SHA1('$this->pw')";

        $this->result =
         $this->db->query($this->query);
        while ($row = $this->result->fetch_row()) {
          echo $row[0] . "<br>";
        }


        // $this->stmt = $this->db->prepare($this->query);
        // if ($this->stmt === FALSE) {
        //   die($this->db->error);
        // }
        // $this->stmt->execute();
        // $this->stmt->bind_result($this->userId, $this->userType, $this->userEmail, $this->userPassword, $this->userFname, $this->userLname, $this->userOrg, $this->userActive);
        // while ($stmt->fetch()) {
        //   printf("s (%s)\n", $this->userFname, $this->userType);
        // }

        $this->db->close();

      }




        // if (mysqli_affected_rows($this->result) == 0) {
        //   echo "found one record";


          /* Store the user's info in an array */
          // $this->records = $this->db->fetchArray($this->result);
          //
          // echo gettype($this->records);
          // print_r($this->records[0]);




        // } else {
        //   echo "couldn't find a record or found more than one";
        // }


      } else {
        echo "bad email or password";
      }



    }
  }

  // public function verifyLogin() {
  //
  //
  //
  //   return ($this->email && $this->pw) ? true : false;
  //
  // }



?>
