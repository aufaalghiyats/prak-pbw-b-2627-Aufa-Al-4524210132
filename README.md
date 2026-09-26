# Tugas 1 Praktikum PBW
## Nama: Aufa Al Ghiyats Sulthan Priatmojo
## Npm: 4524210132

### Modifikasi 1: Kalkulator.php
Pada `kalkulator.php`, saya menambahkan operasi pangkat (`**`).

Sebelum modifikasi, kalkulator hanya menyediakan operasi:
- Penjumlahan (+)
- Pengurangan (-)
- Perkalian (*)
- Pembagian (/)
  
Screenshot Sebelum 
![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/58839565c7f12105e90003b3d759bcce50285cc3/sebelum.png)

Setelah modifikasi, ditambahkan operasi pangkat sehingga pengguna dapat menghitung perpangkatan.

Contoh:
1 + 3 = 4

Screenshot Sesudah
![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/0a752a2f523c4846dad084a8c95f9965adbc76f3/sesudah-kalkulator.png)

### Modifikasi 2: Hitung.php
Pada `hitung.php`, saya menambahkan produk baru yaitu Headset dengan harga Rp300.000 dan diskon 15%.

Hasil perhitungan:
- Keyboard = Rp250.000
- Mouse = Rp135.000
- Headset = Rp255.000
  
Screenshot Sebelum
![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/cc203b0ff7f47cc9b1686af83129c639c4bc4180/sebelum%20(2).png)

Screenshot Sesudah
![image alt](https://github.com/aufaalghiyats/prak-pbw-b-2627-Aufa-Al-4524210132/blob/e1cb27ca5c86785438f3a1cad928b0a3734aad64/sesudah-hitung.png)

## Penjelasan 5 Bagian Kode Penting
### 1. Interface BisaDihitung
```php
interface BisaDihitung
{
    public function hargaAkhir(): float;
}
```

Interface digunakan untuk menentukan bahwa class yang menggunakannya harus memiliki method hargaAkhir().

### **2. Class Produk**
class Produk implements BisaDihitung
```
Class Produk digunakan untuk menyimpan data produk seperti nama dan harga. Class ini juga menerapkan interface BisaDihitung.
```

### **3. Class ProdukDiskon**
class ProdukDiskon extends Produk
```
Class ProdukDiskon merupakan turunan dari Produk dan digunakan untuk menghitung harga produk setelah mendapatkan diskon.
```

### **4. Switch pada Kalkulator**
switch ($operator)
```
Bagian ini digunakan untuk menentukan operasi matematika yang dipilih oleh pengguna, seperti penjumlahan, pengurangan, perkalian, pembagian, dan pangkat.
```

### **5. Perhitungan Harga Setelah Diskon**
return $this->harga * (1 - $this->diskon / 100);
```
Kode tersebut digunakan untuk menghitung harga akhir produk setelah dikurangi persentase diskon.
```

## **Error yang Pernah Muncul**

## **Error: Not Found**
Saat pertama kali menjalankan program melalui localhost, muncul pesan:

Not Found - The requested URL was not found on this server.

**Penyebab**

Folder repository belum berada di dalam folder htdocs milik XAMPP sehingga Apache tidak dapat menemukan file PHP yang ingin dijalankan.

**Perbaikan**

Folder repository dipindahkan ke:

C:\xampp\htdocs\

Setelah itu program dapat dijalankan melalui localhost dan menghasilkan output dengan normal.

