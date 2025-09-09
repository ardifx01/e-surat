<?php
// Konfigurasi Database
$host = 'localhost';
$user = 'surat';
$pass = 'surat2025'; // Kosongkan jika tidak ada password
$db   = 'surat';

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
