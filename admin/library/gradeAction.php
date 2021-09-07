<?php

  require_once('../../config.php');
  require_once '../../connection.php';
  require_once(ADMIN_LIBRARY_PATH . '/grade.php');

  $grade = new Grade($database['host'],$database['username'],$database['password'],$database['name']);


  /* action if there is a submit to add grade */
  if (isset($_POST['addGrade'])) {

    $materiId = $_POST['materi-id'];
    $subTopic = $_POST['sub-topic'];
    $matpelId = $_POST['matpel-id'];
    $topicId = $_POST['topic-id'];

    $studentName = $_POST['student-name'];
    $studentId = $_POST['student-id'];
    $studentClass = $_POST['student-class'];
    $studentGrade = $_POST['student-grade'];

    $message = $grade->addGrade($subTopic,$studentName,$studentId,$studentClass,
                                $studentGrade,$matpelId,$topicId);

    header("Location: ../../?content=quizresult&materi_id=$materiId&student_id=$studentId");
    die;
  }

  if (isset($_POST['delGrade'])) {
    $gradeId = $_POST['delGradeId'];

    $message = $grade->delGrade($gradeId);

    // redirect to grade page
    header("Location: ../?content=grade");
    die;
  }

?>
