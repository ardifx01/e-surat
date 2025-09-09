<?php
include '../config/cek_login.php';
include '../config/koneksi.php';
include '../templates/header.php';
$query = "SELECT d.*, sm.no_surat, sm.perihal FROM tb_disposisi d JOIN tb_surat_masuk sm ON d.id_surat_masuk = sm.id ORDER BY d.tgl_disposisi DESC";
$result = mysqli_query($koneksi, $query);
?>
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Data Disposisi</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>No Surat</th>
            <th>Tujuan</th>
            <th>Isi Disposisi</th>
            <th>Sifat</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          if (mysqli_num_rows($result) > 0): while ($row = mysqli_fetch_assoc($result)) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['no_surat']; ?><br><small><?= $row['perihal']; ?></small></td>
                <td><?= $row['tujuan_disposisi']; ?></td>
                <td><?= $row['isi_disposisi']; ?></td>
                <td><?= $row['sifat']; ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['tgl_disposisi'])); ?></td>
                <td>
                  <!-- TOMBOL CETAK DITAMBAHKAN DI SINI -->
                  <a href="cetak.php?id=<?= $row['id']; ?>" target="_blank" class="btn btn-sm btn-success">Cetak</a>

                  <?php if ($_SESSION['level'] == 'admin'): ?>
                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?');">Hapus</a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endwhile;
          else: ?>
            <tr>
              <td colspan="7" class="text-center">Belum ada data disposisi</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include '../templates/footer.php'; ?>