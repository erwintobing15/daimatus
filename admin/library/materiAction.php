<?php
require_once('../../config.php');
require_once '../../connection.php';
require_once(ADMIN_LIBRARY_PATH . '/materi.php');

$materi = new Materi($database['host'],$database['username'],$database['password'],$database['name']);

// action when there is a submit to add new materi
if (isset($_POST['addMateri'])) {
  $matpelId = $_POST['matpel-add'];
  $topicId = $_POST['topic-add'];
  $subTopic = $_POST['subtopic-add'];
  $video = $_FILES['video-add']['name'];    // get video name
  $file = $_FILES['video-add']['tmp_name']; // get video file

  $message = $materi->addMateri($subTopic,$video,$matpelId,$topicId,$file);
}

// action when there is a submit to delete materi
if (isset($_POST['delMateri'])) {
  $materiId = $_POST['delMateriId'];

  $message = $materi->delMateri($materiId);
}

// action when there is a submit to delete materi
if (isset($_POST['updateMateri'])) {
  $materiId = $_POST['updateMateriId'];
  $subTopic = $_POST['subtopic-update'];
  $video = $_FILES['video-update']['name'];    // get video name
  $file = $_FILES['video-update']['tmp_name']; // get video file

  $message = $materi->updateMateri($materiId,$subTopic,$video,$file);
}

// redirect to materi page
header("Location: ../?content=materi");
die;

?>
