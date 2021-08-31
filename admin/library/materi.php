<?php
/**
 * class Materi that handle database process to display,
 * input new materi, update and delete materi
 */
class Materi
{
  private $conn;

  function __construct($host,$username,$password,$name)
  {
    // create database connection
    $db = new DbConnection($host,$username,$password,$name);
    $this->conn = $db->connect();
  }

    // database handler to get all materi
    public function getMateris() {
      $sql = "SELECT * FROM materi";
      $result = $this->conn->query($sql);

      return $result;
    }

    // database handler to get materi by matpel and topic
    public function getMateriByMatpelTopic($matpelId,$topicId) {
      $sql = "SELECT * FROM materi
              WHERE matpel_id = '".$matpelId."'
              AND topic_id = '".$topicId."'";
      $result = $this->conn->query($sql);

      return $result;
    }

    // database handler to get materi by matpel
    public function getMateriByMatpel($matpelId) {
      $sql = "SELECT * FROM materi
              WHERE matpel_id = '".$matpelId."'";
      $result = $this->conn->query($sql);

      return $result;
    }

    // database handler to get materi by id
    public function getMateriByTopic($topicId) {
      $sql = "SELECT * FROM materi
              WHERE topic_id = '".$topicId."'";
      $result = $this->conn->query($sql);

      return $result;
    }

    // database handler to add new materi
    public function addMateri($subTopic,$video,$matpelId,$topicId,$file) {
      $sql = "INSERT INTO materi (sub_topic, video, matpel_id, topic_id)
              VALUES ('".$subTopic."', '".$video."', '".$matpelId."', '".$topicId."')";

      // add new materi to database and move uploaded file to video/materi
      if ($this->conn->query($sql) == TRUE) {
        move_uploaded_file($file, '../videos/materi/'.$video);
        return "Berhasil menambah materi baru!";
      }
      return FALSE;
    }

    // database handler to delete materi
    public function delMateri($materiId) {
      // delete video file
      $sql_ = "SELECT video FROM materi WHERE materi_id = '".$materiId."'";
      $result = $this->conn->query($sql_);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          unlink('../videos/materi/'.$row['video']);
        }
      }
      // delete database row
      $sql = "DELETE FROM materi WHERE materi_id = '".$materiId."'";
      if ($this->conn->query($sql) == TRUE) {
        return "Berhasil menghapus materi!";
      }
      return FALSE;
    }

    public function updateMateri($materiId,$subTopic,$video,$file) {
      // delete old video
      $sql_ = "SELECT video FROM materi WHERE materi_id = '".$materiId."'";
      $result = $this->conn->query($sql_);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          unlink('../videos/materi/'.$row['video']);
        }
      }
      // update database
      $sql = "UPDATE materi
               SET sub_topic   = '".$subTopic."',
                   video       = '".$video."'
               WHERE materi_id = '".$materiId."'";
      if ($this->conn->query($sql) == TRUE) {
        // upload new video
        move_uploaded_file($file, '../videos/materi/'.$video);
        return "Berhasil mengubah data materi";
      }
      return FALSE;
    }
}
?>
