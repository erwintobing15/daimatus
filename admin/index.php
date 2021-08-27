<?php

  /* redirect to login page if user not login yet  */
  session_start();
  if (!isset($_SESSION['username'])){
    header("Location: login.php");
  }

  /* load config */
  require_once('../config.php');

  /* load admin web header */
  require_once(ADMIN_TEMPLATES_PATH . '/header.php');

  /* load admin web navigation bar */
  require_once(ADMIN_TEMPLATES_PATH . '/navbar.php');

  /* load admin web content */
  require_once(ADMIN_TEMPLATES_PATH . '/content.php');

  /* load admin web footer */
  require_once(ADMIN_TEMPLATES_PATH . '/footer.php');

?>
