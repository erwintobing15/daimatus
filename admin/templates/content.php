<div class="main_content">
    <div class="header">
        <p id="left-header">Selamat datang dihalaman panel admin!!</p>
        <a href="library/action-logout.php" id="right-header"><i class="fa fa-sign-out" style="font-size:18px;color:#009fe1;">Logout</i></a>
    </div>
    <div class="info">
      <?php
        if (!isset($_GET['content'])) {
          require_once(ADMIN_TEMPLATES_PATH . "/home.php");
        } else {
          switch($_GET['content']) {
            case 'home' :  require_once(ADMIN_TEMPLATES_PATH . "/home.php"); break;
            case 'user' :  require_once(ADMIN_TEMPLATES_PATH . '/user.php'); break;
            default:  require_once(ADMIN_TEMPLATES_PATH . "/home.php");
          }
        }
      ?>
    </div>
</div>
