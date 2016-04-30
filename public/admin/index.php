<?php

require_once("../../inc/init.php");

/*
 * home.php
 * This will do something eventually.
 */

/* Check if user is logged in, and redirect to login page if not. */
if (!$session->getLoggedIn()) { redirectTo("login.php"); }

?>

<?php
  include_template_helper("header.php");
?>

  <h2>Home Page</h2>
  <p>
    You are currently at: public/admin/home.php.
  </p>

  <?php for($i = 0; $i < 15; $i++) echo "<br />"; ?>

  <?php include_template_helper("footer.php"); ?>
