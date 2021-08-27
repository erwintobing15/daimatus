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

  public function getUsers() {
    $sql = "SELECT id, username, super FROM user";
    $result = $this->conn->query($sql);

    return $result;
  }

  public function addUser($username,$password,$super) {
    $sql = "INSERT INTO user (username, password, super)
    				VALUES ('".$username."', '".$password."', '".$super."')";

    if ($this->conn->query($sql) == TRUE) {
      return "Berhasil menambah user baru!";
    }
    return FALSE;
  }
}


 ?>
