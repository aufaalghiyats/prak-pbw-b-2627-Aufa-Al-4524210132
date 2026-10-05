# Tugas 3 Praktikum PBW

## Nama: Aufa Al Ghiyats Sulthan Priatmojo

## NIM: 4524210132

## Praktikum: PBW B

## Pertemuan 3

Pada tugas ini saya menjalankan Contoh 1 pada Pertemuan 3 dan melakukan dua modifikasi pada program.

### Modifikasi 1: Menambahkan Tabel Fakultas

Pada `tugas.php`, saya menambahkan tabel `fakultas` untuk menyimpan data fakultas.

Struktur tabel:

```text
fakultas
- id
- kode_fakultas
- nama_fakultas
```

### Modifikasi 2: Menambahkan Tabel Kelas

Saya juga menambahkan tabel `kelas` untuk menyimpan informasi kelas.

Struktur tabel:

```text
kelas
- id
- nama_kelas
- semester
- tahun_ajaran
```

Setelah dilakukan modifikasi, database `akademik` memiliki lima tabel:

- `mahasiswa`
- `dosen`
- `mata_kuliah`
- `fakultas`
- `kelas`

## Penjelasan 5 Bagian Kode Penting

### 1. Membuat Database

```php
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";
```

Kode tersebut digunakan untuk membuat database `akademik`. Jika database sudah tersedia, perintah `IF NOT EXISTS` mencegah database dibuat kembali.

### 2. Memilih Database

```php
mysqli_select_db($koneksi, 'akademik');
```

Kode tersebut digunakan untuk memilih database `akademik` yang akan digunakan untuk membuat tabel.

### 3. Membuat Tabel Mahasiswa

```php
"CREATE TABLE IF NOT EXISTS mahasiswa (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(15) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    prodi VARCHAR(80) NOT NULL,
    angkatan YEAR NOT NULL,
    ipk DECIMAL(3,2) DEFAULT 0.00
) ENGINE=InnoDB"
```

Kode tersebut digunakan untuk membuat tabel `mahasiswa` yang menyimpan data mahasiswa seperti NIM, nama, email, program studi, angkatan, dan IPK.

### 4. Relasi Tabel Mata Kuliah dengan Dosen

```php
FOREIGN KEY (dosen_id) REFERENCES dosen(id)
ON UPDATE CASCADE
ON DELETE SET NULL
```

Kode tersebut membuat relasi antara tabel `mata_kuliah` dengan tabel `dosen`. Kolom `dosen_id` digunakan sebagai foreign key yang mengacu pada `id` di tabel `dosen`.

### 5. Modifikasi Tabel Fakultas

```php
"CREATE TABLE IF NOT EXISTS fakultas (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kode_fakultas VARCHAR(10) NOT NULL UNIQUE,
    nama_fakultas VARCHAR(100) NOT NULL
) ENGINE=InnoDB"
```

Kode tersebut merupakan modifikasi dengan menambahkan tabel `fakultas`. Tabel ini digunakan untuk menyimpan kode dan nama fakultas.

## Error yang Pernah Muncul

### Error: Not Found

Saat pertama kali menjalankan program melalui localhost, muncul pesan:

```text
Not Found

The requested URL was not found on this server.
```

### Penyebab

Error terjadi karena URL yang digunakan tidak sesuai dengan lokasi folder repository di dalam `htdocs`.

### Langkah Perbaikan

Repository berada di dalam folder:

```text
C:\xampp\htdocs\clone pertemuan 3\
```

Kemudian program dijalankan menggunakan URL localhost yang sesuai dengan struktur folder tersebut.

## Screenshot

### Screenshot Sebelum Modifikasi

<img width="1366" height="619" alt="WhatsApp Image 2026-10-05 at 11 07 21" src="https://github.com/user-attachments/assets/83c80c3f-4254-4acb-ab2b-a3c284258dbe" />

### Screenshot Sesudah Modifikasi

![Screenshot Sesudah](screenshots/sesudah.png)
