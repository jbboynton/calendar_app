<!DOCTYPE html>
<html lang="en">

<?php

/*
 * header.php
 * Should be included on every page.  Contains the HTML head section, functions
 * for output buffering and sessions, and requires the config.php script,
 * which provides database connectivity and other global functions.  Currently
 * includes the opening <body> tag and navbar.
 */

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin SAD</title>

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel='stylesheet' href='<?php echo ABS_PATH.'public/js/fullcalendar/dist/fullcalendar.css';?>' />
  <link rel="stylesheet" type="text/css" href='<?php echo ABS_PATH.'public/css/styles.css';?>' />
  <link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet' type='text/css' />
  <link href='https://fonts.googleapis.com/css?family=Prosto+One' rel='stylesheet' type='text/css' />
  <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css' />
  <link rel="icon" href='<?php echo ABS_PATH.'public/img/favicon.png';?>' type="image/png" />

  <!-- JavaScript -->
  <script src= <?php echo ABS_PATH.'public/js/jquery/dist/jquery.min.js'; ?> ></script>
  <script src= <?php echo ABS_PATH.'public/js/moment/min/moment.min.js'; ?> ></script>
  <script src= <?php echo ABS_PATH.'public/js/fullcalendar/dist/fullcalendar.js'; ?> ></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#calendar').fullCalendar({
        // TODO: the calendar
      })
    });
  </script>
</head>
