<?php

/*
 * should be called "index.php"
 * bootstrap file that calls the app constructor
 */

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
