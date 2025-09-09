<?php
include '../config/cek_login.php';
if ($_SESSION['level'] != 'admin') {
  exit("Anda tidak punya akses ke halaman ini.");
}
include '../config/koneksi.php';
include '../templates/header.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_surat_masuk WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>
<div class="card">
  <div class="card-header">
    <h5 class="card-title">Edit Surat Masuk</h5>
  </div>
  <div class="card-body">
    <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $data['id']; ?>"><input type="hidden" name="file_lama" value="<?= $data['file_surat']; ?>">
      <div class="mb-3"><label class="form-label">Nomor Surat</label><input type="text" class="form-control" name="no_surat" value="<?= $data['no_surat']; ?>" required></div>
      <div class="mb-3"><label class="form-label">Tanggal Surat</label><input type="date" class="form-control" name="tgl_surat" value="<?= $data['tgl_surat']; ?>" required></div>
      <div class="mb-3"><label class="form-label">Pengirim</label><input type="text" class="form-control" name="pengirim" value="<?= $data['pengirim']; ?>" required></div>
      <div class="mb-3"><label class="form-label">Perihal</label><input type="text" class="form-control" name="perihal" value="<?= $data['perihal']; ?>" required></div>
      <div class="mb-3"><label class="form-label">File Surat (Kosongkan jika tidak diubah)</label><input type="file" class="form-control" name="file_surat"></div>
      <p>File saat ini: <a href="../uploads/<?= $data['file_surat']; ?>" target="_blank"><?= $data['file_surat']; ?></a></p>
      <button type="submit" name="submit" class="btn btn-primary">Update</button> <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
<?php include '../templates/footer.php'; ?>