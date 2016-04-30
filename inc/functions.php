<?php

/*
 * function.php
 * This file defines commonly used global functions.
 */

/*
 * redirect_to function
 * Redirects the user to a given location.
 * @param $location The location to which the user will be redirected.
 */
function redirectTo($location = NULL) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

/*
 * include_template_helper function
 * Accepts a template file as an argument, and then runs the include command
 * so that the template gets dropped into the current page.
 * @param $template The template to be included.
 */
function include_template_helper($template) {
  include(SITE_ROOT . DS . "public" . DS . "layouts" . DS . $template);
}

/* Checks for valid entries for username, email, and name */
function checkData($candidate) {

  /* Call stripslashes and trim */
  $candidate = stripslashes($candidate);

  // Regex requirements
  $req1 = '%.{2}%';    // At least 2 lowercase letters

  if (preg_match($req1, $candidate)) { return true; }
  else { return false; }
}

/*
 * logEvent function
 * Records a log event.
 */
// function logEvent() {
//
//   $logEntry = makeNewEntry($type of event to log (like login, update, etc))
//
//   if (file exists) {
//
//     if (file is writable) {
//
//       open file()
//       append logEntry to the end of the file()
//       verify logEntry was added
//         if high-priority (
//           send email to admins
//         )
//       close the file
//
//     } else {
//       echo "you don't have permission to write this file";
//     }
//
//   } else {
//     make a new log file
//   }
//
// }

/*
 * viewLogs function
 * View some logs.
 */
// function viewLogs() {
//
//   confirm user is logged in as an admin
//   locate logs/log.txt using SITE_ROOT and DS
//   if (file_exists) {
//     if (file is readable) {
//
//       read the file()
//       show the file in the browser
//       let the user (
//         export the file:
//           save to disk
//           system print
//           choose export type:
//             plaintext
//             csv
//       )
//
//       close the file()
//
//     } else {
//       echo "you don't have permission to read this file";
//     }
//
//   } else {
//     echo "file doesn't exist";
//   }
//
// }

/* ------------------------------------------------------------------------- *
 * Idea for stronger regex, where $flag is the type of data (e.g. email, pw,
 * username, etc.).  Note: avoid calling trim() on first and last names, so
 * that names with spaces keep the correct formatting.
 * ________________________________________________________________________ */
/* ---------------------------------------------------------------------------
  function strong_check_data($candidate, $flag) {

    // Regex requirements
    $req1 = '/^[A-Z]/';      // Uppercase
    $req2 = '/^[a-z]/';      // Lowercase
    $req3 = '/^[0-9]/';      // Numbers
    $req4 = '/^[.-_@ ]/';    // Symbols

    if (preg_match($req1, $candidate) &&
      preg_match($req2, $candidate) &&
      preg_match($req3, $candidate)) &&
      preg_match($req4, $candidate)) { return true; }
    else { return false; }
}
----------------------------------------------------------------------------*/

?>
