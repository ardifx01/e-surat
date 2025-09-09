<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>e-Arsip</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="/arsip-surat/assets/img/favicon.png">

  <!-- Bootstrap CSS -->
  <link href="/arsip-surat/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      overflow-x: hidden;
    }

    #sidebar {
      min-width: 250px;
      max-width: 250px;
      min-height: 100vh;
      transition: all 0.3s;
    }

    @media (max-width: 768px) {
      #sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        height: 100%;
        z-index: 1050;
      }

      #sidebar.show {
        left: 0;
      }

      #content {
        width: 100%;
      }

      .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 1049;
      }

      .overlay.show {
        display: block;
      }
    }

    #content {
      flex: 1;
      display: flex;
      flex-direction: column;
      padding: 20px;
    }

    #sidebar .nav-link {
      border-radius: 8px;
      transition: all 0.3s;
    }

    #sidebar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.15);
      padding-left: 18px;
    }

    #sidebar .nav-link.active {
      background-color: rgba(255, 255, 255, 0.3);
      font-weight: bold;
    }

    footer {
      margin-top: auto;
      /* dorong footer ke bawah */
      text-align: center;
      color: #b1b2b2;
      padding: 0px;
      background: #ffffffff;
      margin-bottom: -10px;
    }

    #sidebarToggle {
      width: 100px;
      /* biar nggak full */
      display: inline-flex;
      padding: 6px 12px;
      justify-content: center;
    }

    .card-hover {
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      cursor: pointer;
    }

    .card-hover:hover {
      transform: translateY(-5px);
      /* card naik sedikit */
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      /* bayangan lebih tegas */
    }

    .bg-gradient-primary {
      background: linear-gradient(90deg, #1e3c72, #2a5298);
    }
  </style>


</head>

<body class="d-flex flex-column min-vh-100">
  <div class="d-flex flex-grow-1">
    <!-- Sidebar -->
    <nav id="sidebar" class="d-flex flex-column p-3"
      style="width:250px; background:linear-gradient(180deg,#1e3c72,#2a5298); color:#fff;">
      <div class="text-center mb-4">
        <h4 class="fw-bold">📂 e-Arsip</h4>
        <hr class="border-light">
      </div>
      <ul class="nav nav-pills flex-column mb-auto">
        <li><a href="/arsip-surat/index.php" class="nav-link text-white d-flex align-items-center gap-2"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="/arsip-surat/surat_masuk/" class="nav-link text-white d-flex align-items-center gap-2"><i class="bi bi-envelope-arrow-down"></i> Surat Masuk</a></li>
        <li><a href="/arsip-surat/surat_keluar/" class="nav-link text-white d-flex align-items-center gap-2"><i class="bi bi-envelope-arrow-up"></i> Surat Keluar</a></li>
        <li><a href="/arsip-surat/disposisi/" class="nav-link text-white d-flex align-items-center gap-2"><i class="bi bi-share"></i> Disposisi</a></li>
        <li><a href="/arsip-surat/pengguna.php" class="nav-link text-white d-flex align-items-center gap-2"><i class="bi bi-people"></i> Pengguna</a></li>
      </ul>
      <div class="mt-auto">
        <hr class="border-light">
        <a href="/arsip-surat/logout.php" class="btn btn-danger w-100 d-flex align-items-center justify-content-center gap-2">
          <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </div>
    </nav>

    <!-- Overlay (mobile) -->
    <div id="overlay" class="overlay"></div>

    <!-- Konten -->
    <div id="content">
      <!-- Tombol toggle sidebar -->
      <button class="btn btn-primary mb-3 d-md-none" id="sidebarToggle">☰ Menu</button>

      <main>