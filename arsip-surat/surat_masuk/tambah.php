<?php include '../config/cek_login.php';
include '../templates/header.php'; ?>
<div class="card">
  <div class="card-header">
    <h5 class="card-title">Tambah Surat Masuk</h5>
  </div>
  <div class="card-body">
    <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3"><label class="form-label">Nomor Surat</label><input type="text" class="form-control" name="no_surat" required></div>
      <div class="mb-3"><label class="form-label">Tanggal Surat</label><input type="date" class="form-control" name="tgl_surat" required></div>
      <div class="mb-3"><label class="form-label">Pengirim</label><input type="text" class="form-control" name="pengirim" required></div>
      <div class="mb-3"><label class="form-label">Perihal</label><input type="text" class="form-control" name="perihal" required></div>
      <div class="mb-3"><label class="form-label">File Surat (PDF/JPG/PNG)</label><input type="file" class="form-control" name="file_surat" required></div>
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button> <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
<?php include '../templates/footer.php'; ?>