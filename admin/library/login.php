<?php

  // create database connection
  require_once('../../config.php');
  require_once '../../connection.php';
  $db = new DbConnection($database['host'],$database['username'],$database['password'],$database['name']);
  $conn = $db->connect();

  // get form login username and pasword input
  $username = $_POST['username'];
  $password = $_POST['password'];

  // get query that match username and password in database
  $sql = "SELECT * FROM user WHERE
                  username='".$username."' AND
                  password='".md5($password)."'";
  $result = $conn->query($sql);

  // redirect to index page if ther is one or more row query result
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      session_start();
      $_SESSION['username'] = $row['username'];
      $_SESSION['user_id'] = $row['user_id'];
    }
    header("Location: ../index.php");
  }
  else {
    header("Location: ../login.html");
  }

?>
