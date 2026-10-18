<?php
include "koneksi.php";

$nim = trim($_GET['nim'] ?? '');

if ($nim === '') {
    exit("NIM mahasiswa tidak ditemukan.");
}

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT * FROM mahasiswa WHERE nim = ?"
);

mysqli_stmt_bind_param($stmt, "s", $nim);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if (!$data) {
    exit("Data mahasiswa tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ubah Data Mahasiswa</title>
</head>
<body class="bg-gray-100 p-6 font-sans text-gray-800">
    <form action="update.php" method="POST"
          class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md flex flex-col">

        <h2 class="text-2xl font-bold mb-5">Ubah Data Mahasiswa</h2>

        <label for="nim" class="text-sm font-semibold mb-1">NIM</label>
        <input type="text" id="nim" name="nim"
               value="<?= htmlspecialchars($data['nim']); ?>"
               readonly
               class="mb-4 p-2 border rounded-lg bg-gray-100">

        <label for="nama" class="text-sm font-semibold mb-1">Nama</label>
        <input type="text" id="nama" name="nama" required maxlength="100"
               value="<?= htmlspecialchars($data['nama']); ?>"
               class="mb-4 p-2 border rounded-lg">

        <label for="email" class="text-sm font-semibold mb-1">Email</label>
        <input type="email" id="email" name="email" required maxlength="100"
               value="<?= htmlspecialchars($data['email']); ?>"
               class="mb-4 p-2 border rounded-lg">

        <label for="prodi" class="text-sm font-semibold mb-1">Program Studi</label>
        <input type="text" id="prodi" name="prodi" required maxlength="100"
               value="<?= htmlspecialchars($data['prodi']); ?>"
               class="mb-4 p-2 border rounded-lg">

        <label for="angkatan" class="text-sm font-semibold mb-1">Angkatan</label>
        <input type="number" id="angkatan" name="angkatan"
               min="2000" max="2099" required
               value="<?= htmlspecialchars($data['angkatan']); ?>"
               class="mb-4 p-2 border rounded-lg">

        <label for="ipk" class="text-sm font-semibold mb-1">IPK</label>
        <input type="number" id="ipk" name="ipk" min="0" max="4"
               step="0.01" required
               value="<?= htmlspecialchars($data['ipk']); ?>"
               class="mb-6 p-2 border rounded-lg">

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-lg">
            Simpan Perubahan
        </button>

        <a href="index.php"
           class="text-center text-blue-600 hover:underline mt-4">
            Batal
        </a>
    </form>
</body>
</html>