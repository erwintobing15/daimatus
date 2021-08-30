<?php
/**
 * class Topic that handle database process to display,
 * input new topic, update and delete topic
 */
class Topic
{

  private $conn;

  function __construct($host,$username,$password,$name)
  {
    // create database connection
    $db = new DbConnection($host,$username,$password,$name);
    $this->conn = $db->connect();
  }

  // database handler to get topic by matpel_id
  public function getTopicByMatpel($matpelId) {
    $sql = "SELECT * FROM topic WHERE matpel_id = '".$matpelId."'";
    $result = $this->conn->query($sql);

    return $result;
  }


}

?>
