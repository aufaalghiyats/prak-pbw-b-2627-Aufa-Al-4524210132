<?php
require_once __DIR__ . '/../models/ProdukModel.php';

class ProdukController {
    private $model;

    public function __construct($koneksi) {
        $this->model = new ProdukModel($koneksi);
    }

    public function index() {
        $produk = $this->model->getAll();
        include __DIR__ . '/../views/produk/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama  = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $stok  = $_POST['stok'];

            if ($this->model->tambah($nama, $harga, $stok)) {
                header("Location: index.php");
                exit;
            }
        }
        include __DIR__ . '/../views/produk/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama  = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $stok  = $_POST['stok'];

            if ($this->model->update($id, $nama, $harga, $stok)) {
                header("Location: index.php");
                exit;
            }
        }
        $data = $this->model->getById($id);
        include __DIR__ . '/../views/produk/edit.php';
    }

    public function delete($id) {
        if ($this->model->hapus($id)) {
            header("Location: index.php");
            exit;
        }
    }
}
?>