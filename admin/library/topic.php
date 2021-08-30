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

  // database handler to add new topic
  public function addTopic($matpelId,$topicName) {
    $sql = "INSERT INTO topic (topic_name, matpel_id)
            VALUES ('".$topicName."', '".$matpelId."')";

    if ($this->conn->query($sql) == TRUE) {
      return "Berhasil menambah topic baru!";
    }
    return FALSE;
  }

  // database handler to delete topic
  public function delTopic($topicId) {
    $sql = "DELETE FROM topic WHERE topic_id = '".$topicId."'";
    if ($this->conn->query($sql) == TRUE) {
      return "Berhasil menghapus topik materi!";
    }
    return FALSE;
  }

  // database handler to update existing topic
  public function updateTopic($topicId,$topicName) {
    // update matpel
    $sql = "UPDATE topic
            SET topic_name    = '".$topicName."'
            WHERE topic_id = '".$topicId."'";
    if ($this->conn->query($sql) == TRUE) {
      return "Berhasil mengubah topik!";
    }
    return FALSE;
  }

}

?>
