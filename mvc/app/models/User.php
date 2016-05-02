<?php

require_once(LIB_PATH . DS . "Database.php");

/*
 * User.php
 * This class represents the User entity.
 */
class User extends DatabaseObj {

  /* == FIELDS ============================================================= */

  protected static $table_name;    // The name of the table in the database

  private $user_id;          // The user's unique ID
  private $user_type;        // The user's account type
  private $user_email;       // The user's unique email address
  private $user_password;    // The user's password
  private $user_fname;       // The user's first name
  private $user_lname;       // The user's last name
  private $user_org;         // The user's organization
  private $user_token_id;    // Session token
  private $user_active;      // Activation code (NULL if active)

  /* == CONSTRUCTOR ======================================================== */

  /*
   * Constructor
   * Constructs a user object.
   */
  public function __construct() { }

  /* == STATIC METHODS ===================================================== */

  /*
   * findByEmail function -- TODO: unused method?

    --- TODO: revise this, it's been moved to a new class

   * Static function that queries the database for a record containing a given
   * email address.  The findBySQL function returns an array containing the
   * objects associated with the result of the query.  So in other words, if
   * the email address was found in the database, the record associated with
   * that email address gets instantiated with the instantiate function, and
   * then stored in an array of objects.  That array, which contains objects
   * for all records returned by the query, is returned to this function.  In
   * this case, every email address must be unique, so that array should only
   * contain one object -- the object associated with the email address.
   * Unless, of course, the email address wasn't found, in which case this
   * function will return false.
   * @param $searchForEmail The email address to be searched for.
   * @return The object associated with the email address on success, false on
       failure.
   */
  public static function findByAttribute($attribute = "", $searchVal = "") {

    $result = self::findBySQL("SELECT * FROM " . self::$table_name . " WHERE '$attribute' = '$searchVal'");

    /* Returns the object array if objects were found, otherwise returns false. */
    return !empty($result) ? $result : false;
  }

  /*
   * findByEmail function -- TODO: unused method?
   * Static function that queries the database for a record containing a given
   * email address.  The findBySQL function returns an array containing the
   * objects associated with the result of the query.  So in other words, if
   * the email address was found in the database, the record associated with
   * that email address gets instantiated with the instantiate function, and
   * then stored in an array of objects.  That array, which contains objects
   * for all records returned by the query, is returned to this function.  In
   * this case, every email address must be unique, so that array should only
   * contain one object -- the object associated with the email address.
   * Unless, of course, the email address wasn't found, in which case this
   * function will return false.
   * @param $searchForEmail The email address to be searched for.
   * @return The object associated with the email address on success, false on
       failure.
   */
  // public static function findByEmail($searchForEmail = "") {
  //
  //   $result = self::findBySQL("SELECT * FROM " . self::$table_name . " WHERE user_email = '$searchForEmail'");
  //
  //   /* Returns the object if it was found, otherwise returns false. */
  //   return !empty($result) ? array_pop($result) : false;
  // }


  /*
   * authenticate function
   * TODO
   */
  public static function authenticate($user_email = "", $user_password = "") {
    global $db;

    $user_email = $db->escapeData($user_email);
    $user_password = $db->escapeData($user_password);


    $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND " .
      "user_password = SHA1('$user_password')";
    $result = self::findBySQL($sql);
    //  -- TODO: is this the right call?

    return !empty($result) ? array_pop($result) : false;
  }

  /*
   * findBySQL function

   --- TODO: revise this, it's been moved to a new class

   * Static function that performs an SQL query.  Then, each row is fetched
   * from the result set, instantiated, and stored in an array.  The array
   * containing the objects is returned.
   * @param $sql The query string.
   * @return An array containing all objects returned from the query.
   */
  public static function findBySQL($sql = "") {
    global $db;
    $object_array = array();    // Array to hold all the objects found

    $result = $db->query($sql);

    /* Keep fetching records until every record in the result set has been
      instantiated. */
    while ($row = $db->fetch_array($result)) {
      $object_array[] = self::instantiate($row);
    }

    return $object_array;
  }

  /*
   * instantiate function
   * Loops through each attribute of an object, and checks if an attribute
   * exists.  If it does exist, then the value stored in the current position
   * is stored in the corresponding field of the object.
   * TODO: this makes no sense, reword it.
   * -- Can this be integrated with the constructor, so that the constructor
   *    initializes each object as it's created?
   * -- Can this function be moved outside the User class so that it can be
   *    used to instantiate other objects as well?  Or do I need to rewrite
   *    this function for each different object?  Can I move this to an
   *    interface?
   * -- Gonna have a problem with getting the password with this function, need
   *    to run it through SHA1()?  Or maybe this can be done later, like when
  *     the password is getting authenticated.
   * @param $record The record to loop over.
   * @return The instantiated object.
   */
  private static function instantiate($record) {
    $class = get_called_class();
    $object = new $class;

    foreach($record as $attribute => $value) {
      if ($object->hasAttribute($attribute)) {
        $object->$attribute = $value;
      }
    }

    return $object;
  }

  /* == INSTANCE METHODS =================================================== */

  /*
   * getEmail function
   * Returns the value stored in the email property.
   * @return The user's email address.
   */
  public function getEmail() {
    return $this->user_email;
  }

  /*
   * hasAttribute function
   * Checks for the existence of an attribute.  If the attribute does exist,
   * returns true, and returns false if the attribute doesn't exist.
   */
  private function hasAttribute($attribute) {
    $object_vars = get_object_vars($this);

    return array_key_exists($attribute, $object_vars);
  }

}

?>
