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

  // database handler to get grade by matpel and topic
  public function getGradeByMatpelTopic($matpelId,$topicId) {
    $sql = "SELECT * FROM grade
            WHERE matpel_id = '".$matpelId."'
            AND topic_id = '".$topicId."'";
    $result = $this->conn->query($sql);

    return $result;
  }

  // database handler to get grade by matpel, student id and topic
  public function getGradeByMatpelTopicStudentId($matpelId,$topicId,$studentId) {
    $sql = "SELECT * FROM grade
            WHERE matpel_id = '".$matpelId."'
            AND student_id = '".$studentId."'
            AND topic_id = '".$topicId."'";
    $result = $this->conn->query($sql);

    return $result;
  }

  // database handler to delete selected grade
  public function delGrade($gradeId) {
    $sql = "DELETE FROM grade WHERE grade_id = '".$gradeId."'";

    if ($this->conn->query($sql) == TRUE) {
      return "Berhasil menghapus nilai!";
    }
    return FALSE;
  }

  // database handler to delete grades by 
  public function delGradeBySubTopic($subTopic) {
    $sql = "DELETE FROM grade WHERE sub_topic = '".$subTopic."'";

    if ($this->conn->query($sql) == TRUE) {
      return "Berhasil menghapus nilai!";
    }
    return FALSE;
  }

  // database handler to delete grades by 
  public function delGradesByMatpelTopic($matpelId,$topicId) {
    $sql = "DELETE FROM grade 
            WHERE matpel_id = '".$matpelId."'
            AND topic_id = '".$topicId."'";

    if ($this->conn->query($sql) == TRUE) {
      return "Berhasil menghapus nilai!";
    }
    return FALSE;
  }

}

?>
