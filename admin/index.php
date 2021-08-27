<?php

  /* redirect to login page if user not login yet  */
  session_start();
  if (!isset($_SESSION['username'])){
    header("Location: login.html");
  }

  /* load config and connection*/
  require_once('../config.php');
  require_once('../connection.php');

  /* load admin web header */
  require_once(ADMIN_TEMPLATES_PATH . '/header.html');

  /* load admin web navigation bar */
  require_once(ADMIN_TEMPLATES_PATH . '/navbar.html');

  /* load admin web content */
  require_once(ADMIN_TEMPLATES_PATH . '/content.html');

  /* load admin web footer */
  require_once(ADMIN_TEMPLATES_PATH . '/footer.html');

?>
