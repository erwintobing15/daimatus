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

  // database handler to get all user
  public function getUsers() {
    $sql = "SELECT user_id, username, super FROM user";
    $result = $this->conn->query($sql);

    return $result;
  }

  // database handler to add new user
  public function addUser($username,$password,$super) {
    $sql = "INSERT INTO user (username, password, super)
    				VALUES ('".$username."', '".$password."', '".$super."')";

    if ($this->conn->query($sql) == TRUE) {
      return "Berhasil menambah user baru!";
    }
    return FALSE;
  }

  // database handler to delete selected user
  public function delUser($userId) {
    $sql = "DELETE FROM user WHERE user_id = '".$userId."'";

    if ($this->conn->query($sql) == TRUE) {
      return "Berhasil menghapus user!";
    }
    return FALSE;
  }

  // database handler to update selected user
  public function updateUser($userId,$username,$password,$super) {
    $sql = "UPDATE user
            SET username      = '".$username."',
                password       = '".$password."',
                super        = '".$super."'
            WHERE user_id = '".$userId."'";
    if ($this->conn->query($sql) == TRUE) {
      return "Berhasil mengubah data user!";
    }
    return FALSE;
  }
}

?>
