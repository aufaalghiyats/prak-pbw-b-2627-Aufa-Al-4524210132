<?php
class ProdukModel {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function getAll() {
        $query = "SELECT * FROM produk ORDER BY id DESC";
        $result = mysqli_query($this->koneksi, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM produk WHERE id = '$id'";
        $result = mysqli_query($this->koneksi, $query);
        return mysqli_fetch_assoc($result);
    }

    public function tambah($nama, $harga, $stok) {
        $query = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')";
        return mysqli_query($this->koneksi, $query);
    }

    public function update($id, $nama, $harga, $stok) {
        $query = "UPDATE produk SET nama_produk = '$nama', harga = '$harga', stok = '$stok' WHERE id = '$id'";
        return mysqli_query($this->koneksi, $query);
    }

    public function hapus($id) {
        $query = "DELETE FROM produk WHERE id = '$id'";
        return mysqli_query($this->koneksi, $query);
    }
}
?>