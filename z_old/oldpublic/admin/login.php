<?php

require_once("../../inc/init.php");
/*
 * Login.php
 * This will eventually do stuff.
 */

/* If the user is logged in, redirect them to "home.php". */
if ($session->getLoggedIn()) { redirectTo("index.php"); }

/* Check to see if the form was submitted. */
if (isset($_POST['submit'])) {
  $user_email = trim($_POST['user_email']);
  $user_password = trim($_POST['user_password']);

  /* Check the database to verify the email address and password. */
  $validUser = User::authenticate($user_email, $user_password);

  // ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;; //
  //                                                  //
  // This is where I could determine whether the user //
  // is an admin or not                               //
  //                                                  //
  // ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;; //

  /* If a valid user is found, log them in and redirect them to "home.php". */
  if ($validUser) {
    echo "here";
    $session->login($validUser);
    redirectTo("index.php");
  } else {
    echo("Username/password incorrect");
  }

} else {
  $user_email = "";
  $user_password = "";
}

?>

  <h2>Login</h2>
  <p>
    You are currently at: public/admin/login.php.
  </p>

  <form action="login.php" method="post">
    <p>
      Email address:
      <input type="email" name="user_email" value="<?php echo htmlentities($user_email);?>" />
    </p>

    <p>
      Password:
      <input type="password" name="user_password" value="<?php echo htmlentities($user_password);?>" />
    </p>

    <p>
      <input type="submit" name="submit" value="submit" />
    </p>

  </form>
