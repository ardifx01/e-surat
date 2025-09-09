<?php
include '../config/cek_login.php';
include '../config/koneksi.php';
include '../templates/header.php';
$keyword = '';
if (isset($_GET['cari'])) {
  $keyword = mysqli_real_escape_string($koneksi, $_GET['cari']);
  $query = "SELECT * FROM tb_surat_keluar WHERE no_surat LIKE '%$keyword%' OR perihal LIKE '%$keyword%' OR tujuan LIKE '%$keyword%' ORDER BY id DESC";
} else {
  $query = "SELECT * FROM tb_surat_keluar ORDER BY id DESC";
}
$result = mysqli_query($koneksi, $query);
?>
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="card-title mb-0">Data Surat Keluar</h5><a href="tambah.php" class="btn btn-success">+ Tambah Surat</a>
  </div>
  <div class="card-body">
    <form action="" method="GET" class="row g-3 mb-3">
      <div class="col-md-5"><input type="text" name="cari" class="form-control" placeholder="Cari no surat, perihal, atau tujuan..." value="<?= htmlspecialchars($keyword); ?>"></div>
      <div class="col-md-2"><button type="submit" class="btn btn-primary">Cari</button></div>
    </form>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>No. Surat</th>
            <th>Tgl Surat</th>
            <th>Tujuan</th>
            <th>Perihal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          if (mysqli_num_rows($result) > 0): while ($row = mysqli_fetch_assoc($result)) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['no_surat']); ?></td>
                <td><?= date('d-m-Y', strtotime($row['tgl_surat'])); ?></td>
                <td><?= htmlspecialchars($row['tujuan']); ?></td>
                <td><?= htmlspecialchars($row['perihal']); ?></td>
                <td><a href="../uploads/<?= $row['file_surat']; ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                  <?php if ($_SESSION['level'] == 'admin'): ?><a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?');">Hapus</a><?php endif; ?>
                </td>
              </tr>
            <?php endwhile;
          else: ?>
            <tr>
              <td colspan="6" class="text-center">Data tidak ditemukan</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include '../templates/footer.php'; ?>