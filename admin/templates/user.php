<?php
  require_once('../config.php');
  require_once '../connection.php';
  require_once(ADMIN_LIBRARY_PATH . '/action-user.php');

  $user = new User($database['host'],$database['username'],$database['password'],$database['name']);

  $result = $user->getUser();
?>
<div>
  <center><h2>Daftar Pengguna</h2></center>
  <button type="button" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Tambah User</button>
  <!-- user table -->
  <table class="table table-bordered">
    <thead class="table-primary">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Super</th>
        <th scope="col">Tindakan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if ($result->num_rows > 0) {
          $counter = 1;
          while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<th scope="row">' . $counter . '</th>';
            echo '<td>' . $row["username"] .'</td>';
            $super = $row["super"] == 1 ? "Ya" : "Tidak";
            echo '<td>' . $super . '</td>';
            echo '<td>';
            echo '<button type="button" class="btn btn-success btn-sm">Ubah</button>';
            echo '<button type="button" class="btn btn-danger btn-sm">Hapus</button>';
            echo '</td>';
            echo '</tr>';
          }
        }
      ?>
    </tbody>
  </table>


</div>
