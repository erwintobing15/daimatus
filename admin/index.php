<?php

  /* redirect to login page if user not login yet  */
  session_start();
  if (!isset($_SESSION['username'])){
    header("Location: login.php");
  }

  /* load config */
  include_once('../config.php');

  /* load admin web header */
  include_once(ADMIN_TEMPLATES_PATH . '/header.php');

  /* load admin web navigation bar */
  include_once(ADMIN_TEMPLATES_PATH . '/navbar.php');

  /* load admin web content */
  include_once(ADMIN_TEMPLATES_PATH . '/content.php');

  /* load admin web footer */
  include_once(ADMIN_TEMPLATES_PATH . '/footer.php');

?>
