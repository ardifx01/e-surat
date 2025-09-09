<?php
include '../config/cek_login.php';
if ($_SESSION['level'] != 'admin') {
  exit("Akses ditolak.");
}
include '../config/koneksi.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query_delete = "DELETE FROM tb_disposisi WHERE id=$id";
  if (mysqli_query($koneksi, $query_delete)) {
    header("Location: index.php?status=hapus_sukses");
  } else {
    header("Location: index.php?status=hapus_gagal");
  }
}
