<?php

  require_once('../../config.php');
  require_once '../../connection.php';
  require_once(ADMIN_LIBRARY_PATH . '/grade.php');

  $grade = new Grade($database['host'],$database['username'],$database['password'],$database['name']);

  // redirect to quiz page
  header("Location: ../../?content=quiz");
  die;

?>
