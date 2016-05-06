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

    /* Check the the form was submitted */
    if (isset($_POST['submitted'])) {

      /* Verify email */
      if (stripslashes(trim($_POST['email']))) {
        $email = $this->db->escapeData($_POST['email']);
      } else {
        $email = false;
        $invalid_data[] = 'Email address';
      }

      /* Verify password */
      if (stripslashes(trim($_POST['password']))) {
        $pw = $this->db->escapeData($_POST['password']);
      } else {
        $pw = false;
        $invalid_data[] = 'Password';
      }

      /* If email and password are valid... */
      if ($email && $pw) {

        /* Check email and password against the users table */
        $result = $this->db->query("SELECT user_id, user_type, user_email, user_password, user_fname, user_lname, user_org, user_active FROM users WHERE user_email='$email' AND user_password = SHA1('$pw')");

        /* If the query is successful... */
        // if ($this->db->)
        // if ($result = mysqli_query($dbc, $query)) {

          echo "get out of here";



          /* If only one row was affected... */
          // if ($this->db->affectedRows() == 0) {
          //
          //   Session::start();
          //   Session::set('loggedIn', 1);
          //   header('location: dashboard');
          //
          // } else {
          //   header('location: dashboard/login');
          // }


            /* Store the user's info in an array */
            // $record = mysqli_fetch_array($result, MYSQLI_NUM);
            // mysqli_free_result($result);

          // } else {
          //   $this->db->close();
          //   echo "more than one affected row";
          // }

//         }else {
//           $this->db->close();
//           echo "username or password were bad";
//         }
//
//       }else {
//         $this->db->close();
//         echo "submitted not set";
//       }
//
//   }
// }

  public function registerUser() {

    // TODO: show navbar with custom links, depending on if the user is signed in or out.

    /* Scrub input from the form */
    if (isset($_POST['submitted'])) {

      $invalid_data = array();

      /* Check for the email */
      if (stripslashes(trim($_POST['email']))) {
        $email = $this->db->escapeData($_POST['email']);
      } else {
        $email = false;
        $invalid_data[] = 'Email address';
      }

      /* Check for the password */
      if (stripslashes(trim($_POST['password1']))) {

        /* Check that password1 matches password2, and that the password isn't the same as the given username */
        if ($_POST['password1'] == $_POST['password2']) {
          $pw = $this->db->escapeData($_POST['password1']);
        } else {
          $pw = false;
          $invalid_data[] = 'Password';
        }
      } else {
        $pw = false;
        $invalid_data[] = 'Password';
      }

      /* Check for the first name */
      if (stripslashes($_POST['fname'])) {
        $fname = $this->db->escapeData($_POST['fname']);
      } else {
        $fname = false;
        $invalid_data[] = 'First name';
      }

      /* Check for the last name */
      if (stripslashes($_POST['lname'])) {
        $lname = $this->db->escapeData($_POST['lname']);
      } else {
        $lname = false;
        $invalid_data[] = 'Last name';
      }

      /* Check for the organization */
      if ($_POST['organization'] == '') {
        $org = false;
        $invalid_data[] = 'Organization';
      } else {
        $org = ($_POST['organization']);
      }

      if ($email && $pw && $fname && $lname) {

        /* Check if the email is already registered */
        $query = "SELECT user_email FROM users WHERE user_email='$email'";
        $this->db->query($query);

        /* If the username wasn't found in the database... */
        if ($this->db->affectedRows == 0) {

          /* Generate activation code */
          $a = md5(uniqid(rand(), true));

          /* Prepare the INSERT query */
          $query = "INSERT INTO users (user_email, user_password, user_fname, user_lname, user_org, user_active) VALUES (?, ?, ?, ?, ?, ?)";
          $stmt = mysqli_prepare($this->db, $query);
          mysqli_stmt_bind_param($stmt, "ssssss", $email, SHA1($pw), $fname, $lname, $org, $a);
          mysqli_stmt_execute($stmt);

          /* If only one record was updated... */
          if ($this->db->affectedRows() == 1) {

            /* Registration successful! */
            $activation_email_body = "Thank you for registering your account with ** SAD Calendar App :( **.  To activate your account, please follow this link:";

            /* Compose message body and send message */
            $activation_email_body .= "http://dev/dashboard.php?act=" . mysqli_insert_id($this->db) . "&y=$a";

            /* TODO: install/configure mail function */
            /* See: http://php.net/manual/en/book.mail.php */
            mail($_POST['email'], 'Confirm your registration: ', $activation_email_body, 'From: calendar@app.com');

            /* TODO: fix this. This is a bad way to output HTML */
            echo '<div class="alert alert-success alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Thank you!</strong> An email confirmation has been sent to you.</div>';

          } else {
            /* TODO: fix this. This is a bad way to output HTML */
            echo '<div class="alert alert-danger alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> You entered invalid data.</div>';
          }

        } else {
          /* TODO: fix this. This is a bad way to output HTML */
          echo '<div class="alert alert-danger alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sorry,</strong> the email address you provided is already registered.</div>';
        }

      } else {
        echo '<div class="alert alert-danger alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> Invalid fields:<p><ul>';
        foreach($invalid_data as $invalid) {
          echo "<li>$invalid</li>";
        }
        echo '</ul></p></div>';
      }

    }

    $this->db->close();


  }

  public function activateUser() {

    /* Check if the user_id was sent ($x) */
    if (isset($_GET['x'])) {
      $x = (int) $_GET['x'];
    } else {
      $x = 0;
    }

    /* Check if the activation code was sent ($y) */
    if (isset($_GET['y'])) {
      $y = $_GET['y'];
    } else {
      $y = 0;
    }

    /* Confirm that user_id was sent and the activation code is the right
      number of characters (should be 32) */
    if (($x > 0) && (strlen($y) == 32)) {

      /* Update the database so that the user_active field associated with
        the user_id is set to null */
      $result = $this->db->query("UPDATE users SET active = NULL WHERE (user_id = $x and user_active = '" . $this->db->escapeData($y) . "') LIMIT 1");

      /* If successful, display a confirmation message */
      if ($this->db->affectedRows() ==  1) {
        echo '<div class="alert alert-success alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success!</strong> Your account has been activated.  Click <a href="login.php" class="alert-link">here</a> to log in. </div>';

      /* If unsuccessful, display a warning message */
      } else {
        echo '<div class="alert alert-danger alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span></button><strong>Error!</strong> Unable to activate account.</div>';
      }

    /* If $x or $y failed the checks, show a warning (TODO: this should
      also make an entry in a log file) */
    } else {
      echo '<div class="alert alert-danger alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span></button><strong>Error!</strong> Unable to activate account.</div>';
    }

  }

  public function logUserOut() {


  }



}
?>

<?php
//         /* Check if the account has been activated */
//         if ($record[7] != NULL) {
//           /* TODO: fix this. This is a bad way to output HTML */
//           echo '<div class="alert alert-danger alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> Unable to locate your account. Click <a href="#" class="alert-link">here</a> to create an account.</div>';
//         }
//
//       /* If anything other than 1 row was affected, show an error */
//       } else {
//         /* TODO: fix this. This is a bad way to output HTML */
//         echo '<div class="alert alert-danger alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> Couldn\'t access your profile. Please try again.</div>';
//       }
//
//     /* If the query isn't successful, show an error. */
//     } else {
//       /* TODO: fix this. This is a bad way to output HTML */
//       echo '<div class="alert alert-danger alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> Couldn\'t access your profile. Please try again.</div>';
//     }
//
//   /* Else, if username and/or password are incorrect... */
//   } else {
//     echo '<div class="alert alert-danger alert-dismissible center-block" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> Invalid fields:<p><ul>';
//     foreach($invalid_data as $invalid) {
//       echo "<li>$invalid</li>";
//     }
//     echo '</ul></p></div>';
//   }
// }

?>
