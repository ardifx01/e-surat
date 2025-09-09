<?php
include 'config/cek_login.php';
include 'config/koneksi.php';
include 'templates/header.php';

$jml_surat_masuk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tb_surat_masuk"))['total'];
$jml_surat_keluar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tb_surat_keluar"))['total'];
$jml_disposisi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tb_disposisi"))['total'];
$jml_pengguna = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tb_users"))['total'];
?>
<div class="row mb-4">
  <div class="col-12">
    <div class="card border-0 shadow-sm bg-gradient-primary text-white rounded-3 p-4 d-flex flex-md-row align-items-center">
      <div class="me-3">
        <i class="bi bi-person-circle fs-1"></i>
      </div>
      <div>
        <h4 class="mb-1">Selamat Datang, <?= htmlspecialchars($_SESSION['nama_lengkap']); ?> 👋</h4>
        <p class="mb-0">Anda login sebagai <strong><?= ucfirst($_SESSION['level']); ?></strong></p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Surat Masuk -->
  <div class="col-xl-3 col-md-6 mb-4">
    <a href="/arsip-surat/surat_masuk/" class="text-decoration-none">
      <div class="card border-primary shadow h-100 py-2 card-hover">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Masuk</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_surat_masuk; ?></div>
            </div>
            <div class="col-auto">
              <i class="bi bi-envelope-arrow-down fs-1 text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Surat Keluar -->
  <div class="col-xl-3 col-md-6 mb-4">
    <a href="/arsip-surat/surat_keluar/" class="text-decoration-none">
      <div class="card border-success shadow h-100 py-2 card-hover">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Keluar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_surat_keluar; ?></div>
            </div>
            <div class="col-auto">
              <i class="bi bi-envelope-arrow-up fs-1 text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Disposisi -->
  <div class="col-xl-3 col-md-6 mb-4">
    <a href="/arsip-surat/disposisi/" class="text-decoration-none">
      <div class="card border-info shadow h-100 py-2 card-hover">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Disposisi</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_disposisi; ?></div>
            </div>
            <div class="col-auto">
              <i class="bi bi-share fs-1 text-info"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Pengguna -->
  <div class="col-xl-3 col-md-6 mb-4">
    <a href="/arsip-surat/pengguna.php" class="text-decoration-none">
      <div class="card border-warning shadow h-100 py-2 card-hover">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengguna</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_pengguna; ?></div>
            </div>
            <div class="col-auto">
              <i class="bi bi-people fs-1 text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>
<!-- Grafik Batang -->
<div class="row mb-4">
  <div class="col-12 col-md-6"> <!-- mobile penuh, desktop setengah -->
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">
        Statistik Data
      </div>
      <div class="card-body chart-container"> <!-- gunakan css khusus -->
        <canvas id="chartSurat"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('chartSurat').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Surat Masuk', 'Surat Keluar', 'Disposisi', 'Pengguna'],
      datasets: [{
        label: 'Jumlah',
        data: [<?= $jml_surat_masuk ?>, <?= $jml_surat_keluar ?>, <?= $jml_disposisi ?>, <?= $jml_pengguna ?>],
        backgroundColor: [
          '#0d6efd', // biru
          '#198754', // hijau
          '#0dcaf0', // cyan
          '#ffc107' // kuning
        ],
        borderRadius: 8
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });
</script>

<style>
  /* Supaya tinggi grafik menyesuaikan device */
  .chart-container {
    position: relative;
    height: 300px;
    /* default desktop */
  }

  /* Jika layar kecil (mobile), tinggi grafik lebih kecil */
  @media (max-width: 768px) {
    .chart-container {
      height: 220px;
    }
  }
</style>



<?php include 'templates/footer.php'; ?>