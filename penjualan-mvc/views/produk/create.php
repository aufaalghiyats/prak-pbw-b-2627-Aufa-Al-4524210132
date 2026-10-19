<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        form { width: 300px; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 8px 15px; background: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form action="index.php?action=create" method="POST">
        <div>
            <label>Nama Produk:</label>
            <input type="text" name="nama_produk" required>
        </div>
        <div>
            <label>Harga:</label>
            <input type="number" name="harga" required>
        </div>
        <div>
            <label>Stok:</label>
            <input type="number" name="stok" required>
        </div>
        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>