<?php

  require_once('../../config.php');
  require_once '../../connection.php';
  require_once(ADMIN_LIBRARY_PATH . '/user.php');

  $user = new User($database['host'],$database['username'],$database['password'],$database['name']);

  // add new user if there is a submit
  if (isset($_POST['addUser'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $super = $_POST['super'];

    $message = $user->addUser($username,md5($password),$super);

    header("Location: ../?content=user");
    die;
  }

  // delete user
  if (isset($_POST['delUser'])) {
    $userId = $_POST['userId'];

    $message = $user->delUser($userId);

    header("Location: ../?content=user");
    die;
  }

?>
