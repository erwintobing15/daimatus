<?php

  class DbConnection
  {
      private $conn;
      private $DB_HOST;
      private $DB_USERNAME;
      private $DB_PASSWORD;
      private $DB_NAME;

      function __construct($host,$username,$password,$name)
      {
          $this->DB_HOST = $host;
          $this->DB_USERNAME = $username;
          $this->DB_PASSWORD = $password;
          $this->DB_NAME = $name;
      }

      function connect() {

          $this->conn = new mysqli($this->DB_HOST, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_NAME);
          if (mysqli_connect_errno()) {
              echo "Gagal Koneksi ke Database: " . mysqli_connect_error();
          }

  	    return $this->conn;
  	}
  }

?>
