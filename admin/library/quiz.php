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
 }
?>
