# Create all necessary MySQL user accounts in this file.

# Main user account
GRANT INSERT, SELECT, DELETE, UPDATE ON calendar_app.*
  TO 'db_user'@'localhost'
  IDENTIFIED BY 'password';
