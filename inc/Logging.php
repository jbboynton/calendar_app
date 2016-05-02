<?php

require_once(LIB_PATH . DS . "Database.php");

/*
 * User.php
 * This class represents the User entity.
 */
class Log extends DatabaseObj {

  /* == FIELDS ============================================================= */



  /* == CONSTRUCTOR ======================================================== */

  /*
   * Constructor
   * Constructs a user object.
   */
  public function __construct() { }

  /* == STATIC METHODS ===================================================== */



  /* == INSTANCE METHODS =================================================== */

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



}

?>
