<?php
/**
 * class Grade that handle database process to display,
 * add and delete grade
 */
class Grade
{
  private $conn;

  function __construct($host,$username,$password,$name)
  {
    // create database connection
    $db = new DbConnection($host,$username,$password,$name);
    $this->conn = $db->connect();
  }

  public function addGrade($subTopic,$studentName,$studentId,$studentClass,
                           $grade,$matpelId,$topicId)
  {
    $sql = "INSERT INTO grade (sub_topic, student_name, student_id, student_class,
                              grade, matpel_id, topic_id)
            VALUES ('".$subTopic."', '".$studentName."', '".$studentId."', '".$studentClass."',
                    '".$grade."', '".$matpelId."','".$topicId."')";

    // add new grade
    if ($this->conn->query($sql) == TRUE) {
      return TRUE;
    }
    return FALSE;
  }
}

?>
