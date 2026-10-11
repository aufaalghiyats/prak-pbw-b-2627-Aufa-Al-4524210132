# Tugas 5 Praktikum PBW

## Nama: Aufa Al Ghiyats Sulthan Priatmojo

## NIM: 4524210132

## Praktikum: PBW B

## Pertemuan 5

## 1. Penjelasan Lima Bagian Kode yang Penting

### 1. Formulir Input Mahasiswa (`form.php`)

Bagian ini digunakan untuk menampilkan formulir pengisian data mahasiswa, seperti NIM, nama, email, program studi, angkatan, dan IPK. Formulir menggunakan metode `POST` untuk mengirimkan data ke `simpan.php`.

### 2. Validasi Formulir (`form.php`)

Validasi ditambahkan untuk memastikan data yang dimasukkan sesuai ketentuan. NIM hanya menerima angka, nama memiliki panjang minimal tiga karakter, program studi menggunakan pilihan dropdown, angkatan memiliki batas nilai, dan IPK dibatasi dari 0 sampai 4.

### 3. Koneksi Database (`koneksi.php`)

Bagian ini digunakan untuk menghubungkan program PHP dengan server MySQL. Koneksi tersebut memungkinkan program mengakses database `akademik1` untuk menyimpan dan membaca data mahasiswa.

### 4. Validasi Data di Server (`simpan.php`)

Bagian ini memeriksa data yang diterima dari formulir sebelum disimpan. Pemeriksaan meliputi NIM, nama, email, program studi, angkatan, dan IPK agar data yang masuk sesuai ketentuan.

### 5. Penyimpanan Data Menggunakan Prepared Statement (`simpan.php`)

Fungsi `mysqli_prepare()`, `mysqli_stmt_bind_param()`, dan `mysqli_stmt_execute()` digunakan untuk menyiapkan dan menjalankan query penyimpanan data mahasiswa. Prepared statement membantu mencegah SQL injection dan membuat penanganan input lebih aman.

## 2. Screenshot Sebelum dan Sesudah Modifikasi

### Screenshot Sebelum Modifikasi

![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/d4020ba0a2434fdf961336ee37b40c330d467115/pertemuan5/sebelum%20-%20form.php.png)

![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/4d960a2c78e7c7f073f7d467bffb7aefaa775dad/pertemuan5/sebelum%20-%20simpan.php.png)

![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/4d960a2c78e7c7f073f7d467bffb7aefaa775dad/pertemuan5/sebelum%20-%20simpan.php%20database.png)

### Screenshot Sesudah Modifikasi

![image alt]()

![image alt]()

![image alt]()

## 3. Error yang Pernah Muncul, Penyebab, dan Perbaikan

### Error: Duplicate Entry

**Pesan error:** `Duplicate entry '4524210132' for key 'nim'`

**Penyebab:** NIM `4524210132` sudah tersimpan di database. Kolom NIM memiliki aturan `UNIQUE`, sehingga NIM yang sama tidak dapat dimasukkan kembali.

**Langkah perbaikan:** Saya menambahkan penanganan kesalahan pada `simpan.php` menggunakan `try-catch`. Jika NIM atau email sudah terdaftar, program menampilkan pesan bahwa data tersebut sudah digunakan. Untuk menyimpan data baru, saya menggunakan NIM dan email yang belum terdaftar.

## Kesimpulan

Melalui tugas Pertemuan 5, saya mempelajari cara membuat formulir input mahasiswa, melakukan validasi data, menghubungkan PHP dengan MySQL, dan menyimpan data menggunakan prepared statement. Saya juga belajar menangani kesalahan ketika data yang dimasukkan sudah terdaftar di database.
