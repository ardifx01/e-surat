<?php
include '../config/cek_login.php';
include '../config/koneksi.php';
if (isset($_POST['submit'])) {
  $id_surat_masuk = $_POST['id_surat_masuk'];
  $tujuan_disposisi = mysqli_real_escape_string($koneksi, $_POST['tujuan_disposisi']);
  $isi_disposisi = mysqli_real_escape_string($koneksi, $_POST['isi_disposisi']);
  $sifat = $_POST['sifat'];
  $catatan = mysqli_real_escape_string($koneksi, $_POST['catatan']);
  $query = "INSERT INTO tb_disposisi (id_surat_masuk, tujuan_disposisi, isi_disposisi, sifat, catatan) VALUES ('$id_surat_masuk', '$tujuan_disposisi', '$isi_disposisi', '$sifat', '$catatan')";
  if (mysqli_query($koneksi, $query)) {
    header("Location: index.php?status=sukses");
  } else {
    header("Location: index.php?status=gagal");
  }
}
