<?php  
    // load header
    require_once("templates/header.php");

    // load navbar
    require_once("templates/navbar.php");

    // website content
    $content = '';
    if (!isset($_GET['content'])) {
      require_once("templates/home.php");
    } else {
      switch($_GET['content']) {
        case 'home' :  require_once("templates/home.php"); break;
        case 'matpel' :  require_once("templates/home.php"); break;
        default:  require_once("templates/home.php");
      }
    } 

    // load footer
    require_once("templates/footer.php");
?>



