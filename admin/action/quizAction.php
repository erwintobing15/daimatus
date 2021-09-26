<?php
require_once('../../config.php');
require_once '../../connection.php';
require_once(ADMIN_MODEL_PATH . '/quiz.php');

$quiz = new Quiz($database['host'],$database['username'],$database['password'],$database['name']);

// action when there is a submit to add new quiz
if (isset($_POST['addQuiz'])) {
  $matpelId = $_POST['matpel-add'];
  $topicId = $_POST['topic-add'];
  $subTopic = $_POST['materi-add'];
  $question = $_POST['question-add'];
  $choice_a = $_POST['choice_a-add'];
  $choice_b = $_POST['choice_b-add'];
  $choice_c = $_POST['choice_c-add'];
  $choice_d = $_POST['choice_d-add'];
  $answer = strtolower($_POST['answer-add']);

  // pass image file if there is
  if (isset($_FILES['img-add']['name'])) {
    $img = $_FILES['img-add']['name'];    // get img name
    $file = $_FILES['img-add']['tmp_name']; // get img file
  }
  else {
    $img = NULL;
    $file = NULL;
  }

  $message = $quiz->addQuiz($subTopic,$img,$question,$choice_a,$choice_b,$choice_c,
                            $choice_d,$answer,$matpelId,$topicId,$file);
}

// action when there is a submit to delete quiz
if (isset($_POST['delQuiz'])) {
  $quizId = $_POST['delQuizId'];

  $message = $quiz->delQuiz($quizId);
}

// action when there is a submit to update quiz
if (isset($_POST['updateQuiz'])) {
  $quizId = $_POST['updateQuizId'];
  $question = $_POST['question-update'];
  $choice_a = $_POST['choice_a-update'];
  $choice_b = $_POST['choice_b-update'];
  $choice_c = $_POST['choice_c-update'];
  $choice_d = $_POST['choice_d-update'];
  $answer = strtolower($_POST['answer-update']);

  // pass image file if there is
  if (isset($_FILES['img-update']['name'])) {
    $img = $_FILES['img-update']['name'];    // get img name
    $file = $_FILES['img-update']['tmp_name']; // get img file
  }
  else {
    $img = NULL;
    $file = NULL;
  }

  $message = $quiz->updateQuiz($quizId,$img,$question,$choice_a,$choice_b,
                               $choice_c,$choice_d,$answer,$file);
}

// redirect to quiz page
header("Location: ../?content=quiz");
die;
?>
