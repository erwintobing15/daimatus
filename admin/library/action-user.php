<?php

/**
 * class User that handle database process to display,
 * input new user, update and delete user
 */
class User
{

  private $conn;

  function __construct($host,$username,$password,$name)
  {
    // create database connection
    $db = new DbConnection($host,$username,$password,$name);
    $this->conn = $db->connect();
  }

  public function getUser() {
    $sql = "SELECT id, username, super FROM user";
    $result = $this->conn->query($sql);

    return $result;
  }
}


 ?>
