# Tugas 6 Praktikum PBW

## Nama: Aufa Al Ghiyats Sulthan Priatmojo

## NIM: 4524210132

## Praktikum: PBW B

## Pertemuan 6

## Deskripsi

Tugas ini merupakan implementasi CRUD (*Create, Read, Update, Delete*) pada data mahasiswa menggunakan PHP dan MySQL. Aplikasi digunakan untuk menambahkan, menampilkan, mengubah, dan menghapus data mahasiswa yang tersimpan di database.

## Modifikasi yang Dilakukan

Beberapa modifikasi yang dilakukan pada aplikasi, yaitu:

1. **Tampilan data mahasiswa:** Menambahkan nomor urut pada tabel, mengurutkan data berdasarkan NIM, dan menambahkan pesan ketika belum ada data mahasiswa.
2. **Form tambah mahasiswa:** Memperbaiki tampilan form dan menambahkan validasi input, seperti format NIM, rentang angkatan, serta nilai IPK antara 0 sampai 4.
3. **Proses penyimpanan data:** Menambahkan validasi data dan *prepared statement* agar input diproses dengan lebih aman. Pesan kesalahan juga dibuat lebih mudah dipahami.
4. **Proses edit data:** Menggunakan *prepared statement* saat mengambil data berdasarkan NIM dan menampilkan data yang akan diubah pada form.
5. **Proses update dan delete:** Menambahkan validasi input, menggunakan *prepared statement*, serta menampilkan pesan ketika data berhasil diubah atau dihapus maupun ketika data tidak ditemukan.

## Penjelasan Lima Bagian Kode Penting

### 1. Menampilkan Data Mahasiswa (`index.php`)

Bagian ini menggunakan perintah `SELECT * FROM mahasiswa ORDER BY nim ASC` untuk mengambil dan mengurutkan data mahasiswa berdasarkan NIM. Data ditampilkan dalam bentuk tabel dengan nomor urut, identitas mahasiswa, IPK, serta tombol Edit dan Hapus. Fungsi `htmlspecialchars()` digunakan untuk membantu mencegah teks input ditampilkan sebagai HTML yang tidak diinginkan.

### 2. Form Tambah Mahasiswa (`create.php`)

File ini menyediakan form untuk memasukkan NIM, nama, email, program studi, angkatan, dan IPK. Data dikirim menggunakan metode `POST` ke `store.php`. Validasi HTML, seperti `required`, `min`, `max`, dan `step`, membantu pengguna memasukkan data sesuai ketentuan.

### 3. Menyimpan Data (`store.php`)

File ini menerima data dari form dan memeriksa apakah semua kolom sudah diisi. Validasi juga dilakukan pada NIM, email, angkatan, dan IPK. Fungsi `mysqli_prepare()` dan `mysqli_stmt_bind_param()` digunakan untuk menjalankan perintah `INSERT` dengan parameter, sehingga input tidak langsung digabungkan ke dalam query SQL.

### 4. Mengubah Data (`edit.php` dan `update.php`)

File `edit.php` mengambil data mahasiswa berdasarkan NIM menggunakan query berparameter, kemudian menampilkannya pada form. File `update.php` memvalidasi data yang dikirim dan menjalankan perintah `UPDATE` untuk menyimpan perubahan. NIM digunakan sebagai identitas data yang diperbarui.

### 5. Menghapus Data (`delete.php`)

File ini menerima NIM mahasiswa yang akan dihapus, memvalidasi NIM, lalu menjalankan perintah `DELETE` menggunakan *prepared statement*. Fungsi `mysqli_stmt_affected_rows()` digunakan untuk memeriksa apakah ada data yang berhasil dihapus. Aplikasi kemudian menampilkan pesan sesuai hasil proses.

## Error yang Pernah Muncul

**Error:** Duplicate entry `01010` for key pada saat menambahkan data mahasiswa.

**Penyebab:** NIM `01010` sudah tersimpan di database dan kolom NIM memiliki aturan unik, sehingga NIM yang sama tidak dapat digunakan untuk data baru.

**Langkah Perbaikan:**

1. Memeriksa data mahasiswa yang sudah tersimpan di database.
2. Menggunakan NIM baru yang belum terdaftar untuk pengujian.
3. Menambahkan penanganan kesalahan pada `store.php` agar pengguna memperoleh pesan bahwa NIM atau email sudah terdaftar.

Setelah perbaikan, data dapat ditambahkan menggunakan NIM yang berbeda dan pesan kesalahan menjadi lebih mudah dipahami.

## Pengujian CRUD

Pengujian dilakukan melalui browser dengan Apache dan MySQL yang dijalankan menggunakan XAMPP.

- **Create:** Menambahkan data mahasiswa baru melalui form.
- **Read:** Memastikan data mahasiswa tampil pada tabel.
- **Update:** Mengubah nama atau IPK mahasiswa dan memeriksa hasilnya.
- **Delete:** Menghapus data percobaan dan memastikan data tersebut tidak lagi muncul pada tabel.

## Screenshot

### Sebelum Modifikasi

![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/297c157ab9529bf05c7bbd139b4d0831f3224184/pertemuan6/sebelum%20-%20index.php.png)

### Sesudah Modifikasi

![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/297c157ab9529bf05c7bbd139b4d0831f3224184/pertemuan6/sesudah%20-%20index.php.png)

## Kesimpulan

Aplikasi CRUD data mahasiswa telah dimodifikasi dengan memperbaiki tampilan, menambahkan validasi input, menggunakan *prepared statement*, dan memberikan penanganan kesalahan yang lebih jelas. Pengujian Create, Read, Update, dan Delete dilakukan untuk memastikan fungsi utama aplikasi berjalan sesuai kebutuhan.

