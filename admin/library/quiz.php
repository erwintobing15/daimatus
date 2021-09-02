<?php
/**
 * class Quiz that handle database process to display,
 * input new quiz, update and delete quiz
 */
 class Quiz
 {
   private $conn;

   function __construct($host,$username,$password,$name)
   {
     // create database connection
     $db = new DbConnection($host,$username,$password,$name);
     $this->conn = $db->connect();
   }

   // database handler to get quiz by matpel and topic
   public function getQuizByMatpelTopic($matpelId,$topicId) {
     $sql = "SELECT * FROM quiz
             WHERE matpel_id = '".$matpelId."'
             AND topic_id = '".$topicId."'";
     $result = $this->conn->query($sql);

     return $result;
   }

   // database handler to get all quiz
   public function getQuizzes() {
     $sql = "SELECT * FROM quiz";
     $result = $this->conn->query($sql);

     return $result;
   }

   // database handler to get quiz by matpel and topic
   public function getQuizById($quizId) {
     $sql = "SELECT * FROM quiz
             WHERE quiz_id = '".$quizId."'";
     $result = $this->conn->query($sql);

     return $result;
   }

   // database handler to get quiz by sub topic
   public function getQuizBySubTopic($subTopic) {
     $sql = "SELECT * FROM quiz
             WHERE sub_topic = '".$subTopic."'";
     $result = $this->conn->query($sql);

     return $result;
   }

   // database handler to add new quiz
   public function addQuiz($subTopic,$img,$question,$choice_a,$choice_b,$choice_c,
                             $choice_d,$answer,$matpelId,$topicId,$file)
   {
     $sql = "INSERT INTO quiz (sub_topic, img, question, choice_a, choice_b, choice_c,
                               choice_d, answer, matpel_id, topic_id)
             VALUES ('".$subTopic."', '".$img."', '".$question."', '".$choice_a."',
                     '".$choice_b."', '".$choice_c."', '".$choice_d."', '".$answer."',
                     '".$matpelId."','".$topicId."')";

     // add new matkul to database
     if ($this->conn->query($sql) == TRUE) {
       // uploadfile to image/matpel if there is
       if ($img != "") {
         move_uploaded_file($file, '../images/quiz/'.$img);
       }
       return "Berhasil menambah soal baru!";
     }
     return FALSE;
   }

   // database handler to delete selected quiz
   public function delQuiz($quizId) {
     // delete image file
     $sql_ = "SELECT img FROM quiz WHERE quiz_id = '".$quizId."'";
     $result = $this->conn->query($sql_);
     if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
         unlink('../images/quiz/'.$row['img']);
       }
     }
     // delete database row
     $sql = "DELETE FROM quiz WHERE quiz_id = '".$quizId."'";
     if ($this->conn->query($sql) == TRUE) {
       return "Berhasil menghapus soal yang dipilih!";
     }
     return FALSE;
   }

   // database handler to update selected quiz
   public function updateQuiz($quizId,$img,$question,$choice_a,$choice_b,
                              $choice_c,$choice_d,$answer,$file) {
     // delete old image file
     $sql_ = "SELECT img FROM quiz WHERE quiz_id = '".$quizId."'";
     $result = $this->conn->query($sql_);
     if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
         if ($row['img'] != "") {
           unlink('../images/quiz/'.$row['img']);
         }
       }
     }
     // update quiz
     $sql_ = "UPDATE quiz
              SET question       = '".$question."',
                  choice_a       = '".$choice_a."',
                  choice_b       = '".$choice_b."',
                  choice_c       = '".$choice_c."',
                  choice_d       = '".$choice_d."',
                  img            = '".$img."',
                  answer         = '".$answer."'
              WHERE quiz_id = '".$quizId."'";
     if ($this->conn->query($sql_) == TRUE) {
       // upload new image
       if ($img != "") {
         move_uploaded_file($file, '../images/quiz/'.$img);
       }
       return "Berhasil mengubah data soal!";
     }
     return FALSE;
   }
 }
?>
