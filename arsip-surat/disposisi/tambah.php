<?php
include '../config/cek_login.php';
include '../config/koneksi.php';
include '../templates/header.php';
if (!isset($_GET['id_surat'])) {
  header('Location: ../surat_masuk/');
  exit();
}
$id_surat = $_GET['id_surat'];
$result_surat = mysqli_query($koneksi, "SELECT no_surat, perihal FROM tb_surat_masuk WHERE id = $id_surat");
$surat = mysqli_fetch_assoc($result_surat);
?>
<div class="card">
  <div class="card-header">
    <h5 class="card-title">Buat Disposisi</h5>
  </div>
  <div class="card-body">
    <h6>Detail Surat:</h6>
    <p><strong>No. Surat:</strong> <?= htmlspecialchars($surat['no_surat']); ?></p>
    <p><strong>Perihal:</strong> <?= htmlspecialchars($surat['perihal']); ?></p>
    <hr>
    <form action="proses_tambah.php" method="POST">
      <input type="hidden" name="id_surat_masuk" value="<?= $id_surat; ?>">
      <div class="mb-3"><label class="form-label">Tujuan Disposisi</label><input type="text" class="form-control" name="tujuan_disposisi" required></div>
      <div class="mb-3"><label class="form-label">Isi Disposisi</label><textarea class="form-control" name="isi_disposisi" rows="3" required></textarea></div>
      <div class="mb-3"><label class="form-label">Sifat</label><select class="form-select" name="sifat">
          <option value="Biasa">Biasa</option>
          <option value="Penting">Penting</option>
          <option value="Segera">Segera</option>
        </select></div>
      <div class="mb-3"><label class="form-label">Catatan</label><input type="text" class="form-control" name="catatan"></div>
      <button type="submit" name="submit" class="btn btn-primary">Kirim Disposisi</button> <a href="../surat_masuk/index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
<?php include '../templates/footer.php'; ?>