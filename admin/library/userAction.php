<?php

  require_once('../../config.php');
  require_once '../../connection.php';
  require_once(ADMIN_LIBRARY_PATH . '/user.php');

  $user = new User($database['host'],$database['username'],$database['password'],$database['name']);

  // add new user if there is a submit
  if (isset($_POST['addUser'])) {
    $username = $_POST['username-add'];
    $password = $_POST['password-add'];
    $super = $_POST['super-add'];

    $message = $user->addUser($username,md5($password),$super);
  }

  // delete user
  if (isset($_POST['delUser'])) {
    $userId = $_POST['userId'];

    $message = $user->delUser($userId);
  }

  // update user
  if (isset($_POST['updateUser'])) {
    $userId = $_POST['userId'];

    $username = $_POST['username-update'];
    $password = $_POST['password-update'];
    $super = $_POST['super-update'];

    $message = $user->updateUser($userId,$username,md5($password),$super);
  }

  header("Location: ../?content=user");
  die;

?>
