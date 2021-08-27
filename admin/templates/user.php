<?php
  require_once(ADMIN_LIBRARY_PATH . '/user.php');

  $user = new User($database['host'],$database['username'],$database['password'],$database['name']);

  $result = $user->getUsers();
?>
<div>
  <center><h2>Daftar Pengguna</h2></center>
  <!-- btn add new user -->
  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
  data-bs-target="#add-user" style="margin-bottom: 10px;">Tambah User</button>
  <div class="modal fade" id="add-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../admin/library/user-action.php" method="post">
            <div class="mb-3">
              <label for="username" class="col-form-label">Username:</label>
              <input type="text" class="form-control" id="username" name="username" value="">
            </div>
            <div class="mb-3">
              <label for="password" class="col-form-label">Password:</label>
              <input type="password" class="form-control" id="password" name="password" value="">
            </div>
            <div class="mb-3">
              <label for="super" class="col-form-label">Super:</label>
              <select name="super" id="super" class="form-select" aria-label=".form-select-sm example">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
              </select>
            </div>
            <div style="float: right;">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
              <!-- <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="addUser">Tambah</button> -->
              <input type="submit" name="addUser"  class="btn btn-primary" value="Tambah">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- display user table -->
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
        while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <th scope="row"><?php echo $counter; ?></th>
            <td><?php echo $row["username"]; ?></td>
            <?php
              $super = $row["super"] == 1 ? "Ya" : "Tidak";
              $counter += 1;
            ?>
            <td><?php echo $super ?></td>
            <td>
              <button type="button" class="btn btn-success btn-sm">Ubah</button>
              <button type="button" class="btn btn-danger btn-sm">Hapus</button>
            </td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>


</div>
