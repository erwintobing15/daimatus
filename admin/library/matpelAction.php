<?php

require_once('../../config.php');
require_once '../../connection.php';
require_once(ADMIN_LIBRARY_PATH . '/matpel.php');

$matpel = new Matpel($database['host'],$database['username'],$database['password'],$database['name']);

// add a new matpel if there is a submit method
if (isset($_POST['addMatpel'])) {
  $name = $_POST['name-add'];
  $img = $_FILES['img-add']['name'];       // get image name
  $file = $_FILES['img-add']['tmp_name'];  // get image file
  $grade = strtoupper($_POST['grade-add']); // change grade to uppercase
  $active = $_POST['active-add'];

  list($width, $height, $type, $attr) = getimagesize($file);

  $message = $matpel->addMatpel($name,$img,$grade,$active,$file);
}

if (isset($_POST['delMatpel'])) {
  $matpelId = $_POST['matpelId'];

  $message = $matpel->delMatpel($matpelId);
}

// redirect to matpel page
header("Location: ../?content=matpel");
die;

?>
