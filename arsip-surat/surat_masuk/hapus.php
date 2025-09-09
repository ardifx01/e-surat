<?php
include '../config/cek_login.php';
if ($_SESSION['level'] != 'admin') {
  exit("Akses ditolak.");
}
include '../config/koneksi.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query_select = mysqli_query($koneksi, "SELECT file_surat FROM tb_surat_masuk WHERE id=$id");
  $data = mysqli_fetch_assoc($query_select);
  $file_untuk_dihapus = $data['file_surat'];
  if (file_exists("../uploads/" . $file_untuk_dihapus)) {
    unlink("../uploads/" . $file_untuk_dihapus);
  }
  $query_delete = "DELETE FROM tb_surat_masuk WHERE id=$id";
  if (mysqli_query($koneksi, $query_delete)) {
    header("Location: index.php?status=hapus_sukses");
  } else {
    header("Location: index.php?status=hapus_gagal");
  }
}
