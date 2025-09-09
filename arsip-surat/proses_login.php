<?php
session_start();
// Pastikan file koneksi di-include
include 'config/koneksi.php';

// Cek apakah form telah disubmit
if (isset($_POST['login'])) {

  // Ambil input dari form
  $username = $_POST['username'];
  $password = $_POST['password']; // Ambil password asli tanpa diubah

  // 1. Ganti query biasa dengan PREPARED STATEMENT untuk keamanan
  $query = "SELECT * FROM tb_users WHERE username = ?";
  $stmt = mysqli_prepare($koneksi, $query);

  // 2. Bind parameter ke statement
  mysqli_stmt_bind_param($stmt, "s", $username);

  // 3. Eksekusi statement
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // 4. Cek apakah username ditemukan (hanya ada 1 baris)
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    // 5. Verifikasi password dengan password_verify()
    // Gunakan variabel $password asli dari $_POST
    if (password_verify($password, $row['password'])) {
      // Jika login berhasil, buat session
      $_SESSION['login'] = true;
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
      $_SESSION['level'] = $row['level'];
      $_SESSION['username'] = $row['username']; // Tambahkan username ke session jika perlu

      // Arahkan ke halaman utama setelah login (misal: halaman admin/dashboard)
      header("Location: index.php"); // Pastikan ini halaman yang benar setelah login
      exit;
    }
  }

  // Jika username tidak ditemukan atau password salah, arahkan kembali ke login
  // Pesan error dibuat umum untuk keamanan
  header("Location: login.php?pesan=Username atau password salah!");
  exit;
} else {
  // Jika user mencoba akses file ini secara langsung
  header("Location: login.php");
  exit;
}
