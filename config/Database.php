<?php 
class Database {
  // DB Params (use environment variables)
  private $host = '';
  private $db_name = '';
  private $username = '';
  private $password = '';
  private $conn;

  // DB Connect
  public function connect() {
    $this->conn = null;

    // Get environment variables
    $this->host = getenv('DB_HOST');  // Set DB host from environment variable
    $this->db_name = getenv('DB_NAME');  // Set DB name from environment variable
    $this->username = getenv('DB_USER');  // Set DB user from environment variable
    $this->password = getenv('DB_PASS');  // Set DB password from environment variable

    try { 
      // Create PDO connection string
      $dsn = 'pgsql:host=' . $this->host . ';dbname=' . $this->db_name;
      $this->conn = new PDO($dsn, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo 'Connection Error: ' . $e->getMessage();
    }

    return $this->conn;
  }
}
