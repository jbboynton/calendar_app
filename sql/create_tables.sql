# Create all necessary tables using this file.

# users table
CREATE TABLE users (
  user_id SMALLINT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT UNIQUE,
  user_type ENUM('user', 'admin'),
  user_email VARCHAR(255) NOT NULL UNIQUE,
  user_password VARCHAR(255) NOT NULL,
  user_fname VARCHAR(60) NOT NULL,
  user_lname VARCHAR(60) NOT NULL,
  user_org VARCHAR(60) NOT NULL,
  user_token_id INT NULL,
  user_active CHAR(32),
  PRIMARY KEY (user_id)
) ENGINE=INNODB;

# bookings table
CREATE TABLE bookings (
  book_id SMALLINT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT UNIQUE,
  book_date_of_res DATETIME NOT NULL,
  book_from_time TIME NOT NULL,
  book_to_time TIME NOT NULL,
  book_status ENUM('booked', 'pending', 'rejected', 'cancelled') NOT NULL,
  book_booked_on DATE NOT NULL,
  book_fk_user SMALLINT UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (book_id),
  FOREIGN KEY (book_fk_user) REFERENCES users (user_id)
); ENGINE=INNODB;
