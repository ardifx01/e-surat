<?php
include '../config/cek_login.php';
include '../config/koneksi.php';
if (isset($_POST['submit'])) {
  $no_surat = mysqli_real_escape_string($koneksi, $_POST['no_surat']);
  $tgl_surat = $_POST['tgl_surat'];
  $tgl_diterima = date('Y-m-d');
  $pengirim = mysqli_real_escape_string($koneksi, $_POST['pengirim']);
  $perihal = mysqli_real_escape_string($koneksi, $_POST['perihal']);
  if ($_FILES['file_surat']['error'] === 4) {
    echo "<script>alert('Pilih file terlebih dahulu!');</script>";
    return false;
  }
  $namaFile = $_FILES['file_surat']['name'];
  $ukuranFile = $_FILES['file_surat']['size'];
  $tmpName = $_FILES['file_surat']['tmp_name'];
  $extValid = ['jpg', 'jpeg', 'png', 'pdf', 'docx', 'xlsx'];
  $ext = explode('.', $namaFile);
  $ext = strtolower(end($ext));
  if (!in_array($ext, $extValid)) {
    echo "<script>alert('Yang Anda upload bukan gambar/PDF!');</script>";
    return false;
  }
  if ($ukuranFile > 2000000) {
    echo "<script>alert('Ukuran file terlalu besar! (Maks 2MB)');</script>";
    return false;
  }
  $namaFileBaru = uniqid() . '.' . $ext;
  move_uploaded_file($tmpName, '../uploads/' . $namaFileBaru);
  $query = "INSERT INTO tb_surat_masuk (no_surat, tgl_surat, tgl_diterima, pengirim, perihal, file_surat) VALUES ('$no_surat', '$tgl_surat', '$tgl_diterima', '$pengirim', '$perihal', '$namaFileBaru')";
  if (mysqli_query($koneksi, $query)) {
    header("Location: index.php?status=sukses");
  } else {
    header("Location: index.php?status=gagal");
  }
}
