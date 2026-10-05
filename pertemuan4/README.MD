# Tugas 4 Praktikum PBW

## Nama: Aufa Al Ghiyats Sulthan Priatmojo

## NIM: 4524210132

## Praktikum: PBW B

## Pertemuan 4

### Modifikasi 1: `tugascnth1.php`

Pada tugas ini dilakukan modifikasi pada file `tugascnth1.php` berdasarkan file `contoh1.php`.

Modifikasi yang dilakukan adalah menambahkan **filter program studi** pada query `SELECT`.

### Kode Sebelum Modifikasi

```php
WHERE ipk >= 3.50
```

Kode tersebut hanya menampilkan mahasiswa yang memiliki IPK minimal 3.50.

### Kode Setelah Modifikasi

```php
WHERE ipk >= 3.50
AND prodi = 'Teknik Informatika'
```

Dengan modifikasi tersebut, program hanya menampilkan mahasiswa yang memiliki **IPK minimal 3.50** dan berasal dari **Teknik Informatika**.

### Hasil Program

```text
--- HASIL QUERY SELECT ---
NIM  : 2026001
Nama : Andi Pratama
Prodi: Teknik Informatika
IPK  : 3.75
```

### Penjelasan 5 Bagian Kode Penting

**1. `require_once 'koneksi.php'`**

Digunakan untuk menghubungkan program PHP dengan database MySQL melalui file `koneksi.php`.

**2. `mysqli_select_db($koneksi, 'akademik')`**

Digunakan untuk memilih database `akademik` yang akan digunakan.

**3. `INSERT IGNORE`**

Digunakan untuk memasukkan data mahasiswa ke dalam tabel `mahasiswa`. `INSERT IGNORE` mencegah error ketika data yang sama sudah terdapat di database.

**4. Query `SELECT`**

Digunakan untuk mengambil data mahasiswa dengan kriteria IPK minimal 3.50 dan program studi Teknik Informatika.

**5. `mysqli_fetch_assoc()`**

Digunakan untuk mengambil data hasil query satu per satu dan menampilkannya ke layar.

### Cara Menjalankan

Program dijalankan melalui Terminal VS Code menggunakan PHP dari XAMPP:

```powershell
C:\xampp\php\php.exe pertemuan4\tugascnth1.php
```

MySQL pada XAMPP harus dalam keadaan **ON** agar program dapat terhubung dengan database.

### Kesimpulan

Modifikasi pada `tugascnth1.php` berhasil menambahkan filter berdasarkan program studi. Program sekarang hanya menampilkan mahasiswa **Teknik Informatika dengan IPK minimal 3.50**.
