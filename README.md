# 📂 e-Arsip Surat

Aplikasi **e-Arsip Surat Berbasis Web** untuk mengelola surat masuk, surat keluar, dan disposisi pada instansi atau organisasi.  
Dibangun menggunakan **PHP**, **MySQL**, dan **Bootstrap** agar mudah digunakan serta responsif.

---

## 🚀 Fitur Utama
- 🔑 **Login & Autentikasi** dengan level user (Admin & Operator).
- 📥 **Manajemen Surat Masuk** (tambah, edit, hapus, cetak).
- 📤 **Manajemen Surat Keluar** (tambah, edit, hapus, cetak).
- 📌 **Disposisi Surat** dengan catatan dan tujuan disposisi.
- 👥 **Manajemen Pengguna** (khusus Admin).
- 📎 **Upload Lampiran** surat (PDF/DOCX).
- 📊 **Dashboard** ringkasan data.

---

## 🛠️ Teknologi yang Digunakan
- **Backend**: PHP 8
- **Database**: MySQL / MariaDB
- **Frontend**: HTML, CSS, Bootstrap
- **Web Server**: Apache (XAMPP / Laragon)

---

## ⚙️ Instalasi
1. Clone repository:
   ```bash
   git clone https://github.com/username/e-arsip-surat.git
````

2. Pindahkan folder ke direktori web server (misalnya `htdocs` pada XAMPP):

   ```
   C:\xampp\htdocs\e-arsip-surat
   ```

3. Import database `surat.sql` ke MySQL melalui phpMyAdmin.

4. Sesuaikan konfigurasi database pada file:

   ```
   app/koneksi.php
   ```

   ```php
   <?php
   $koneksi = mysqli_connect("localhost", "root", "", "surat");
   ?>
   ```

5. Jalankan aplikasi melalui browser:

   ```
   http://localhost/e-arsip-surat/
   ```

---

## 👤 Akun Demo

* **Admin**

  * Username: `admin`
  * Password: `admin123`

* **Operator**

  * Username: `operator`
  * Password: `operator123`

---

## 📷 Cuplikan Tampilan

* Halaman Login
* Dashboard Utama
* Data Surat Masuk
* Data Surat Keluar
* Disposisi Surat

*(tambahkan screenshot di folder `/screenshots`)*

---

## 🌐 Link Demo

Aplikasi demo dapat diakses melalui:
🔗 [https://app.kelolawarga.my.id/arsip-surat/](https://app.kelolawarga.my.id/arsip-surat/)

User demo: `admin`
Password: `admin123`

---

## 📜 Lisensi

Proyek ini dibuat untuk keperluan tugas kuliah mata kuliah **Pengembangan Aplikasi Basis Data**.
Boleh digunakan, dimodifikasi, dan dikembangkan lebih lanjut sesuai kebutuhan.

```

---

Apakah README ini mau saya **sesuaikan tampilannya dengan tabel** (misalnya daftar fitur dan akun demo dalam tabel), supaya lebih rapi di GitHub?
```
