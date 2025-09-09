<?php
include '../config/koneksi.php';


// Cek apakah ID ada di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
  echo "ID Disposisi tidak valid.";
  exit;
}

$id = $_GET['id'];

// Query untuk mengambil data disposisi dan surat masuk terkait
$query = "SELECT 
            d.tujuan_disposisi, d.isi_disposisi, d.sifat, d.catatan, d.tgl_disposisi,
            sm.no_surat, sm.tgl_surat, sm.tgl_diterima, sm.pengirim, sm.perihal
          FROM 
            tb_disposisi d
          JOIN 
            tb_surat_masuk sm ON d.id_surat_masuk = sm.id
          WHERE 
            d.id = $id";

$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
  echo "Data disposisi tidak ditemukan.";
  exit;
}

$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Lembar Disposisi - <?= htmlspecialchars($data['no_surat']); ?></title>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="/arsip-surat/assets/img/favicon.png">
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
      background-color: #fff;
    }

    .kop-surat {
      text-align: center;
      border-bottom: 3px solid #000;
      padding-bottom: 15px;
      margin-bottom: 20px;
    }

    .kop-surat h3,
    .kop-surat h4 {
      margin: 0;
      font-weight: bold;
    }

    .kop-surat p {
      margin: 5px 0 0;
      font-size: 14px;
    }

    .table-bordered td,
    .table-bordered th {
      border: 1px solid #000 !important;
      padding: 5px;
      vertical-align: top;
    }

    .judul-disposisi {
      text-align: center;
      font-weight: bold;
      text-decoration: underline;
      margin-bottom: 20px;
    }

    .content-table td:first-child {
      width: 150px;
    }

    .disposisi-details {
      min-height: 100px;
    }

    .ttd-section {
      margin-top: 50px;
      text-align: right;
      /* supaya isi rata tengah */
    }

    .posisi-ttd {
      margin-bottom: 50px;
      padding-right: 60px;
      /* jarak ke nama di bawahnya */
    }


    /* CSS untuk menyembunyikan elemen saat mencetak */
    @media print {
      .no-print {
        display: none !important;
      }

      body {
        margin: 0;
        -webkit-print-color-adjust: exact;
        /* Untuk browser Chrome/Safari */
        color-adjust: exact;
        /* Standar */
      }

      .container {
        width: 100% !important;
        padding: 0 !important;
      }
    }
  </style>
</head>

<body>
  <div class="container mt-4">
    <div class="kop-surat">
      <h3>UNIVERSITAS TEKNOLOGI KREATIF</h3>
      <h4>FAKULTAS ILMU KOMPUTER</h4>
      <p>Jl. Pendidikan No. 123, Kota Akademik, Kode Pos 45678</p>
    </div>

    <h5 class="judul-disposisi">LEMBAR DISPOSISI</h5>

    <table class="table table-bordered content-table">
      <tbody>
        <tr>
          <td><strong>No. Surat</strong></td>
          <td>: <?= htmlspecialchars($data['no_surat']); ?></td>
          <td><strong>Tanggal Diterima</strong></td>
          <td>: <?= date('d-m-Y', strtotime($data['tgl_diterima'])); ?></td>
        </tr>
        <tr>
          <td><strong>Tanggal Surat</strong></td>
          <td>: <?= date('d-m-Y', strtotime($data['tgl_surat'])); ?></td>
          <td><strong>Sifat</strong></td>
          <td>: <strong><?= htmlspecialchars($data['sifat']); ?></strong></td>
        </tr>
        <tr>
          <td><strong>Asal Surat</strong></td>
          <td colspan="3">: <?= htmlspecialchars($data['pengirim']); ?></td>
        </tr>
        <tr>
          <td><strong>Perihal</strong></td>
          <td colspan="3">: <?= htmlspecialchars($data['perihal']); ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered content-table mt-3">
      <tbody>
        <tr>
          <td><strong>Diteruskan Kepada</strong></td>
          <td class="disposisi-details"><?= htmlspecialchars($data['tujuan_disposisi']); ?></td>
        </tr>
        <tr>
          <td><strong>Isi Disposisi</strong></td>
          <td class="disposisi-details"><?= nl2br(htmlspecialchars($data['isi_disposisi'])); ?></td>
        </tr>
        <tr>
          <td><strong>Catatan</strong></td>
          <td class="disposisi-details"><?= htmlspecialchars($data['catatan']); ?></td>
        </tr>
      </tbody>
    </table>

    <div class="ttd-wrapper">
      <div class="ttd-section">
        <p class="posisi-ttd">Pimpinan,</p>
        <br><br><br>
        <p><strong>(Dosen Pembimbing, S.Pd)</strong></p>
      </div>
    </div>




    <div class="text-center mt-5 no-print">
      <button class="btn btn-primary" onclick="window.print()">Cetak Halaman</button>
      <button class="btn btn-secondary" onclick="window.close()">Tutup</button>
    </div>
  </div>
</body>

</html>