<?php  
    // load config
    require_once("config.php");
    
    // load header
    require_once(TEMPLATES_PATH . "/header.php");

    // load navbar
    require_once(TEMPLATES_PATH . "/navbar.php");

    // website content
    if (!isset($_GET['content'])) {
      require_once(TEMPLATES_PATH . "/home.php");
    } else {
      switch($_GET['content']) {
        case 'home' :  require_once(TEMPLATES_PATH . "/home.php"); break;
        case 'matpel' :  require_once(TEMPLATES_PATH . "/matpel.php"); break;
        default:  require_once(TEMPLATES_PATH . "/home.php");
      }
    } 

    // load footer
    require_once(TEMPLATES_PATH . "/footer.php");
?>



