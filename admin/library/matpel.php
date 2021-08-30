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

  // database handler to select matpel by id
  public function selectMatpelById($matpelId) {
    $sql = "SELECT name FROM matpel WHERE matpel_id = '".$matpelId."'";
    $result = $this->conn->query($sql);

    return $result;
  }

  // database handler to add new matpel
  public function addMatpel($name,$img,$grade,$active,$file) {
    // get user_id from session
    session_start();
    $userId = $_SESSION['user_id'];
    $sql = "INSERT INTO matpel (name, img, grade, active, user_id)
            VALUES ('".$name."', '".$img."', '".$grade."', '".$active."', '".$userId."')";
    // check if image size is 500x500px
    list($width, $height, $type, $attr) = getimagesize($file);
    if ($width != 500 or $height != 500) {
      session_start();
      $_SESSION["warning"] = "Ukuran gambar harus 500x500 pixel, silahkan coba kembali!";
      return FALSE;
    }
    // add new matkul to database and move uploaded file to image/matpel
    if ($this->conn->query($sql) == TRUE) {
      move_uploaded_file($file, '../images/matpel/'.$img);
      return "Berhasil menambah matpel baru!";
    }
    return FALSE;
  }

  // database handler to delete selected matpel
  public function delMatpel($matpelId) {
    // delete image file
    $sql = "SELECT img FROM matpel WHERE matpel_id = '".$matpelId."'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        unlink('../images/matpel/'.$row['img']);
      }
    }
    // delete database row
    $sql_ = "DELETE FROM matpel WHERE matpel_id = '".$matpelId."'";
    if ($this->conn->query($sql_) == TRUE) {
      return "Berhasil menghapus mata pelajaran!";
    }
    return FALSE;
  }

  // database handler to update selected matpel
  public function updateMatpel($matpelId,$name,$img,$grade,$active,$file) {
    // delete old image
    $sql = "SELECT img FROM matpel WHERE matpel_id = '".$matpelId."'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        unlink('../images/matpel/'.$row['img']);
      }
    }
    // check if image size is 500x500px
    list($width, $height, $type, $attr) = getimagesize($file);
    if ($width != 500 or $height != 500) {
      session_start();
      $_SESSION["warning"] = "Ukuran gambar harus 500x500 pixel, silahkan coba kembali!";
      return FALSE;
    }
    // update matpel
    $sql_ = "UPDATE matpel
             SET name      = '".$name."',
                 img       = '".$img."',
                 grade       = '".$grade."',
                 active        = '".$active."'
             WHERE matpel_id = '".$matpelId."'";
    if ($this->conn->query($sql_) == TRUE) {
      // upload new image
      move_uploaded_file($file, '../images/matpel/'.$img);
      return "Berhasil mengubah data mata pelajaran!";
    }
    return FALSE;
  }

}

?>
