<?php

  require_once('../../config.php');
  require_once '../../connection.php';
  require_once(ADMIN_LIBRARY_PATH . '/grade.php');

  $grade = new Grade($database['host'],$database['username'],$database['password'],$database['name']);

  if (isset($_POST['delGrade'])) {
    $gradeId = $_POST['delGradeId'];

    $message = $grade->delGrade($gradeId);
  }

  // redirect to grade page
  header("Location: ../?content=grade");
  die;

?>
