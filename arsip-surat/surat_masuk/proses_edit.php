<?php
include '../config/cek_login.php';
if ($_SESSION['level'] != 'admin') {
  exit("Anda tidak punya akses.");
}
include '../config/koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $no_surat = mysqli_real_escape_string($koneksi, $_POST['no_surat']);
  $tgl_surat = $_POST['tgl_surat'];
  $pengirim = mysqli_real_escape_string($koneksi, $_POST['pengirim']);
  $perihal = mysqli_real_escape_string($koneksi, $_POST['perihal']);
  $file_lama = $_POST['file_lama'];
  $file_baru = $file_lama;
  if ($_FILES['file_surat']['error'] !== 4) {
    $namaFile = $_FILES['file_surat']['name'];
    $ukuranFile = $_FILES['file_surat']['size'];
    $tmpName = $_FILES['file_surat']['tmp_name'];
    $extValid = ['jpg', 'jpeg', 'png', 'pdf'];
    $ext = strtolower(end(explode('.', $namaFile)));
    if (in_array($ext, $extValid) && $ukuranFile <= 2000000) {
      $file_baru = uniqid() . '.' . $ext;
      move_uploaded_file($tmpName, '../uploads/' . $file_baru);
      if (file_exists('../uploads/' . $file_lama)) {
        unlink('../uploads/' . $file_lama);
      }
    }
  }
  $query = "UPDATE tb_surat_masuk SET no_surat='$no_surat', tgl_surat='$tgl_surat', pengirim='$pengirim', perihal='$perihal', file_surat='$file_baru' WHERE id='$id'";
  if (mysqli_query($koneksi, $query)) {
    header("Location: index.php?status=edit_sukses");
  } else {
    header("Location: index.php?status=edit_gagal");
  }
}
