<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px 15px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
        }

        button, .kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .kembali {
            background: #e2e8f0;
            color: #1e293b;
        }

        .error {
            color: #b91c1c;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Edit Produk</h2>

    <?php if ($error !== ''): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form
        action="index.php?aksi=edit&id=<?= (int) $data['id'] ?>"
        method="POST"
    >
        <label for="nama_produk">Nama Produk</label>
        <input
            type="text"
            id="nama_produk"
            name="nama_produk"
            maxlength="100"
            required
            value="<?= htmlspecialchars((string) $data['nama_produk']) ?>"
        >

        <label for="harga">Harga (Rp)</label>
        <input
            type="number"
            id="harga"
            name="harga"
            min="0"
            step="0.01"
            required
            value="<?= htmlspecialchars((string) $data['harga']) ?>"
        >

        <label for="stok">Stok</label>
        <input
            type="number"
            id="stok"
            name="stok"
            min="0"
            step="1"
            required
            value="<?= htmlspecialchars((string) $data['stok']) ?>"
        >

        <button type="submit">Simpan Perubahan</button>
        <a class="kembali" href="index.php">Kembali</a>
    </form>
</div>
</body>
</html>