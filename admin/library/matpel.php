<?php
/**
 * class Matpel that handle database process to display,
 * input new matpel, update and delete matpel
 */
class Matpel
{

  private $conn;

  function __construct($host,$username,$password,$name)
  {
    // create database connection
    $db = new DbConnection($host,$username,$password,$name);
    $this->conn = $db->connect();
  }

  // database handler to get all matpel
  public function getMatpels() {
    $sql = "SELECT * FROM matpel";
    $result = $this->conn->query($sql);

    return $result;
  }
}

?>
