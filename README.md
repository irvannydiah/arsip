<div align="center">

# 📁 Arsip.php
### Sistem Arsip Dokumen Berbasis Web (PHP & MySQL)

**Kelola akun pengguna, unggah, dan telusuri dokumen digital dalam satu aplikasi sederhana.**

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com)
[![PDO](https://img.shields.io/badge/Database-PDO-blue?style=for-the-badge)](https://www.php.net/manual/en/book.pdo.php)
[![License](https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge)](LICENSE)

</div>

---

## 📌 Tentang Arsip.php

**Arsip.php** adalah aplikasi web sederhana untuk pengarsipan dokumen digital yang dibangun menggunakan PHP native dan MySQL. Sistem ini memungkinkan pengguna untuk mendaftar, login, mengunggah dokumen beserta judul dan deskripsinya, serta melihat kembali daftar dokumen yang telah diunggah.

> **Cocok untuk latihan/pembelajaran** konsep CRUD, autentikasi sesi (session), dan upload file menggunakan PHP native tanpa framework.

---

## ✨ Fitur Utama

- 🔐 **Autentikasi Pengguna** — Registrasi akun baru dan login menggunakan session PHP, dengan password yang di-hash (`password_hash`/`password_verify`).
- 🖥️ **Dashboard** — Halaman utama setelah login sebagai pusat navigasi menuju fitur upload dan lihat dokumen.
- 📤 **Upload Dokumen** — Unggah file beserta judul dan deskripsi, tersimpan otomatis ke folder `uploads/` dan tercatat di database.
- 📄 **Lihat Dokumen** — Menampilkan daftar dokumen milik pengguna yang sedang login, lengkap dengan tautan unduh.
- 🚪 **Logout Aman** — Mengakhiri session pengguna dan mengarahkan kembali ke halaman login.
- 🛡️ **Proteksi Halaman** — Halaman dashboard, upload, dan lihat dokumen hanya bisa diakses jika pengguna sudah login (`isLoggedIn()`).

---

## 🧪 Langkah-Langkah Demo

```text
1️⃣ Skenario 1: Registrasi & Login
   └─ Buka register.php, daftarkan akun baru (username, email, password).
   └─ Setelah berhasil, login melalui login.php menggunakan akun tersebut.

2️⃣ Skenario 2: Upload Dokumen
   └─ Setelah login, klik 'Upload Document' dari dashboard.
   └─ Isi judul, deskripsi, dan pilih file, lalu klik 'Upload'.

3️⃣ Skenario 3: Lihat Dokumen
   └─ Klik 'View Documents' dari dashboard.
   └─ Daftar dokumen yang pernah diunggah akan tampil beserta tautan unduh.
```

---

## 🛠️ Tech Stack

| Teknologi | Kegunaan |
|---|---|
| [PHP](https://www.php.net) | Bahasa pemrograman server-side (native, tanpa framework) |
| [MySQL](https://www.mysql.com) | Database relasional untuk menyimpan data pengguna & dokumen |
| [PDO](https://www.php.net/manual/en/book.pdo.php) | Lapisan akses database yang aman dari SQL Injection |
| CSS | Styling tampilan (`style.css`) |

---

## 🚀 Cara Menjalankan Lokal

### Prasyarat
- [XAMPP](https://www.apachefriends.org) / Laragon / server lokal dengan PHP & MySQL
- PHP versi 7.4 ke atas
- MySQL / MariaDB

### 1. Clone / Salin Project

```bash
git clone https://github.com/username/Arsip.php.git
cd Arsip.php
```

Letakkan folder project ini di dalam `htdocs` (XAMPP) atau `www` (Laragon).

### 2. Konfigurasi Database

Buka file `db.php` dan sesuaikan kredensial database sesuai environment lokal Anda:

```php
$host = 'localhost';
$dbname = 'arsip_lantana';
$username = 'root';
$password = '';
```

### 3. Buat Database & Tabel

Buat database bernama `arsip_lantana` melalui phpMyAdmin/MySQL CLI, lalu jalankan query berikut:

```sql
CREATE DATABASE IF NOT EXISTS arsip_lantana;
USE arsip_lantana;

-- TABEL USERS
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- TABEL DOCUMENTS
CREATE TABLE Documents (
    document_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    file_path VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);
```

### 4. Siapkan Folder Upload

Buat folder `uploads/` di root project dan pastikan folder tersebut memiliki izin tulis (writable):

```bash
mkdir uploads
```

### 5. Jalankan Server

Jalankan Apache & MySQL melalui XAMPP/Laragon, lalu buka:

```
http://localhost/Arsip.php/login.php
```

---

## 📁 Struktur Project

```
Arsip.php/
├── config.php            # Session handling & fungsi helper (isLoggedIn, redirectTo)
├── db.php                # Koneksi database (PDO)
├── index.php              # Halaman percobaan menampilkan data Users
├── login.php              # Halaman & proses login
├── register.php           # Halaman & proses registrasi akun
├── logout.php             # Proses logout & hancurkan session
├── dashboard.php          # Halaman utama setelah login
├── upload_document.php    # Form & proses upload dokumen
├── view_document.php      # Menampilkan daftar dokumen milik pengguna
├── uploads/                # Folder penyimpanan file dokumen yang diunggah
└── style.css               # Styling tampilan
```

---

## ⚠️ Catatan Pengembangan

- File `index.php` masih menggunakan fungsi MySQLi (`num_rows`, `fetch_assoc`) sementara file lain menggunakan PDO — perlu diseragamkan agar tidak terjadi error.
- Validasi input & sanitasi nama file pada `upload_document.php` sebaiknya ditambahkan sebelum digunakan di lingkungan produksi.
- Tautan navigasi `view_documents.php` pada `dashboard.php` perlu disamakan penulisannya dengan nama file asli `view_document.php`.

---

<div align="center">

📄 **Lisensi**

Project ini dilindungi di bawah lisensi MIT.

Dibuat dengan ❤️ untuk latihan pengembangan web dengan PHP native.
</div>
