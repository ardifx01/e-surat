<?php
session_start();
if (isset($_SESSION['login'])) {
  header('Location: index.php');
  exit;
}
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login e-Arsip</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="/arsip-surat/assets/img/favicon.png">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-card {
      width: 100%;
      max-width: 400px;
      border: none;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      animation: fadeIn 0.8s ease-in-out;
    }

    .login-card-header {
      background: #fff;
      text-align: center;
      padding: 30px 20px 10px;
    }

    .login-logo {
      width: 80px;
      height: 80px;
      object-fit: contain;
      margin-bottom: 15px;
    }

    .login-card-header h3 {
      font-weight: 600;
      margin-bottom: 5px;
      color: #333;
    }

    .login-card-header small {
      color: #777;
    }

    .login-card-body {
      padding: 25px;
      background: #fff;
    }

    .form-control {
      border-radius: 10px;
      padding: 10px 14px;
    }

    .btn-login {
      border-radius: 10px;
      padding: 10px;
      font-weight: 500;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      border: none;
      transition: transform 0.2s ease;
    }

    .btn-login:hover {
      transform: scale(1.03);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <div class="card login-card">
    <div class="login-card-header">
      <!-- Tambahkan logo di sini -->
      <img src="assets/img/favicon.png" alt="Logo e-Arsip" class="login-logo">
      <h3>Login e-Arsip</h3>
      <small>Silakan masuk untuk melanjutkan</small>
    </div>
    <div class="login-card-body">
      <?php if (isset($_GET['pesan'])): ?>
        <div class="alert alert-danger text-center py-2" role="alert">
          <?= htmlspecialchars($_GET['pesan']); ?>
        </div>
      <?php endif; ?>

      <form action="proses_login.php" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
        </div>
        <div class="d-grid">
          <button type="submit" name="login" class="btn btn-login text-white">Login</button>
        </div>
      </form>
    </div>
  </div>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>