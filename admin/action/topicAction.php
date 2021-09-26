<?php

require_once('../../config.php');
require_once '../../connection.php';
require_once(ADMIN_MODEL_PATH . '/topic.php');

$topic = new Topic($database['host'],$database['username'],$database['password'],$database['name']);

// action when there is a submit to add new topic
if (isset($_POST['addTopic'])) {
  $matpelId = $_POST['matpel-add'];
  $topicName = strtoupper($_POST['topic-add']); // change topic to uppercase

  $message = $topic->addTopic($matpelId,$topicName);
}

// action when there is a submit to delete topic
if (isset($_POST['delTopic'])) {
  $topicId = $_POST['delTopicId'];

  $message = $topic->delTopic($topicId);
}

// action when ther is a submit to update topic
if (isset($_POST['updateTopic'])) {
  $topicId = $_POST['updateTopicId'];
  $topicName = strtoupper($_POST['topic-update']); // change topic to uppercase

  $message = $topic->updateTopic($topicId,$topicName);
}

// redirect to matpel page
header("Location: ../?content=topic");
die;

?>
