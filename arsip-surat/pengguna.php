<?php
include 'config/cek_login.php';
include 'config/koneksi.php';
include 'templates/header.php';

// Ambil data pengguna
$result = mysqli_query($koneksi, "SELECT * FROM tb_users ORDER BY id_user ASC");
?>

<div class="card">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-0">Daftar Pengguna</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-primary">
          <tr>
            <th width="5%">No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Level</th>
          </tr>
        </thead>
        <tbody>
          <?php if (mysqli_num_rows($result) > 0): ?>
            <?php $no = 1;
            while ($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                <td><?= htmlspecialchars($row['username']); ?></td>
                <td>
                  <?php if ($row['level'] == 'admin'): ?>
                    <span class="badge bg-danger">Admin</span>
                  <?php else: ?>
                    <span class="badge bg-success">Operator</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="text-center">Belum ada data pengguna</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include 'templates/footer.php'; ?>