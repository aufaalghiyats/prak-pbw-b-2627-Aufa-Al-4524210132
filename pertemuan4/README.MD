# Tugas 4 Praktikum PBW

## Nama: Aufa Al Ghiyats Sulthan Priatmojo

## NIM: 4524210132

## Praktikum: PBW B

## Pertemuan 4

Pada tugas ini saya menjalankan Contoh 1 pada Pertemuan 4 dan melakukan modifikasi pada program untuk menampilkan data mahasiswa berdasarkan program studi dan IPK.

### Modifikasi 1: Menambahkan Filter Program Studi

Pada `tugascnth1.php`, saya menambahkan kondisi `prodi = 'Teknik Informatika'` pada query `SELECT`.

Kode sebelum modifikasi:

```php
$sqlSelect = "SELECT nim, nama, prodi, ipk
              FROM mahasiswa
              WHERE ipk >= 3.50
              ORDER BY ipk DESC, nama ASC
              LIMIT 10";
```

Kode setelah modifikasi:

```php
$sqlSelect = "SELECT nim, nama, prodi, ipk
              FROM mahasiswa
              WHERE ipk >= 3.50
              AND prodi = 'Teknik Informatika'
              ORDER BY ipk DESC, nama ASC
              LIMIT 10";
```

Dengan modifikasi tersebut, program hanya menampilkan mahasiswa yang memiliki IPK minimal 3.50 dan berasal dari Program Studi Teknik Informatika.

Hasil yang ditampilkan:

```text
NIM  : 2026001
Nama : Andi Pratama
Prodi: Teknik Informatika
IPK  : 3.75
```

## Penjelasan 5 Bagian Kode Penting

### 1. Menghubungkan File Koneksi

```php
require_once 'koneksi.php';
```

Kode tersebut digunakan untuk memanggil file `koneksi.php` agar program dapat terhubung dengan database MySQL.

### 2. Memilih Database

```php
mysqli_select_db($koneksi, 'akademik');
```

Kode tersebut digunakan untuk memilih database `akademik` yang akan digunakan oleh program.

### 3. Menambahkan Data Mahasiswa

```php
$sqlInsert = "INSERT IGNORE INTO mahasiswa (nim, nama, email, prodi, angkatan, ipk) VALUES
('2026001', 'Andi Pratama', 'andi@example.ac.id', 'Teknik Informatika', 2025, 3.75),
('2026002', 'Siti Rahma', 'siti@example.ac.id', 'Sistem Informasi', 2026, 3.80),
('2026003', 'Budi Santoso', 'budi@example.ac.id', 'Teknik Informatika', 2025, 3.25),
('2026004', 'Lina Permata', 'lina@example.ac.id', 'Sistem Informasi', 2026, 3.20);";
```

Kode tersebut digunakan untuk memasukkan data mahasiswa ke dalam tabel `mahasiswa`. `INSERT IGNORE` digunakan agar data yang sudah ada tidak menyebabkan error duplikasi.

### 4. Menampilkan Data Berdasarkan Kondisi

```php
$sqlSelect = "SELECT nim, nama, prodi, ipk
              FROM mahasiswa
              WHERE ipk >= 3.50
              AND prodi = 'Teknik Informatika'
              ORDER BY ipk DESC, nama ASC
              LIMIT 10";
```

Kode tersebut digunakan untuk mengambil data mahasiswa yang memiliki IPK minimal 3.50 dan berasal dari Teknik Informatika. Data kemudian diurutkan berdasarkan IPK terbesar dan nama secara alfabetis.

### 5. Mengambil dan Menampilkan Hasil Query

```php
while ($row = mysqli_fetch_assoc($result)) {
    echo "NIM  : " . $row['nim'] . "\n";
    echo "Nama : " . $row['nama'] . "\n";
    echo "Prodi: " . $row['prodi'] . "\n";
    echo "IPK  : " . $row['ipk'] . "\n";
}
```

Kode tersebut digunakan untuk mengambil hasil query satu per satu menggunakan `mysqli_fetch_assoc()` kemudian menampilkan NIM, nama, prodi, dan IPK mahasiswa.

## Error yang Pernah Muncul

### Error: PHP Tidak Dikenali di Terminal

Saat pertama kali menjalankan program melalui Terminal VS Code menggunakan perintah:

```text
php -S localhost:8000
```

muncul pesan:

```text
php : The term 'php' is not recognized as the name of a cmdlet, function, script file, or operable program.
```

### Penyebab

Error terjadi karena PHP dari XAMPP belum terdaftar pada `PATH` Windows sehingga perintah `php` tidak dapat langsung digunakan melalui Terminal VS Code.

### Langkah Perbaikan

Program dijalankan menggunakan lokasi PHP yang terdapat di XAMPP:

```text
C:\xampp\php\php.exe pertemuan4\tugascnth1.php
```

Dengan cara tersebut, file PHP dapat dijalankan langsung melalui Terminal VS Code tanpa menggunakan browser.

## Screenshot

### Screenshot Sebelum Modifikasi

![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/main/pertemuan4/sebelum.png)

### Screenshot Sesudah Modifikasi

![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/main/pertemuan4/sesudah.png)

### Contoh 2: UPDATE, SELECT, GROUP BY, dan DELETE

Pada `contoh2.php`, program digunakan untuk melakukan beberapa operasi pada database `akademik`, yaitu mengubah data mahasiswa, menampilkan rekap mahasiswa berdasarkan prodi, melakukan verifikasi data, dan menghapus data mahasiswa.

### 1. UPDATE Data Mahasiswa

```php
$sqlUpdate = "UPDATE mahasiswa SET ipk = 3.40 WHERE nim = '2025003'";
```

Kode tersebut digunakan untuk mengubah nilai IPK mahasiswa dengan NIM `2025003` menjadi **3.40**.

### 2. SELECT dan GROUP BY

```php
$sqlRekap = "SELECT prodi, COUNT(*) AS jumlah, ROUND(AVG(ipk),2) AS rata_ipk
             FROM mahasiswa
             GROUP BY prodi
             ORDER BY jumlah DESC";
```

Kode tersebut digunakan untuk membuat rekap jumlah mahasiswa dan rata-rata IPK berdasarkan program studi.

`COUNT(*)` digunakan untuk menghitung jumlah mahasiswa, sedangkan `AVG(ipk)` digunakan untuk menghitung rata-rata IPK. `GROUP BY prodi` mengelompokkan data berdasarkan program studi.

### 3. Verifikasi Data

```php
$sqlVerifikasi = "SELECT * FROM mahasiswa WHERE nim = '2025003'";
```

Kode tersebut digunakan untuk memeriksa apakah mahasiswa dengan NIM `2025003` terdapat di dalam database sebelum dilakukan penghapusan.

Jika data ditemukan, program akan menampilkan NIM, nama, dan IPK mahasiswa.

### 4. DELETE Data

```php
$sqlDelete = "DELETE FROM mahasiswa WHERE nim = '2025003'";
```

Kode tersebut digunakan untuk menghapus data mahasiswa dengan NIM `2025003` dari tabel `mahasiswa`.

Penghapusan dilakukan setelah data berhasil diverifikasi terlebih dahulu.

### 5. Menampilkan Hasil Query

```php
while ($row = mysqli_fetch_assoc($resultRekap)) {
    echo "Prodi       : " . $row['prodi'] . "\n";
    echo "Jumlah      : " . $row['jumlah'] . "\n";
    echo "Rata-rata IPK: " . $row['rata_ipk'] . "\n";
}
```

Kode tersebut digunakan untuk mengambil hasil query rekap satu per satu dan menampilkan nama prodi, jumlah mahasiswa, serta rata-rata IPK.

### Alur Program

Program berjalan dengan urutan:

**UPDATE → REKAP DATA → VERIFIKASI DATA → DELETE**

Dengan urutan tersebut, program terlebih dahulu mengubah data IPK, kemudian membuat rekap mahasiswa berdasarkan prodi, memeriksa data mahasiswa yang akan dihapus, dan terakhir menghapus data tersebut dari database.

## Screenshot

### Screenshot Sebelum Modifikasi

![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/main/pertemuan4/sebelum2.png)

### Screenshot Sesudah Modifikasi

![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/main/pertemuan4/sesudah2.png)
