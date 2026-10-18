
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit("Silakan kirim data melalui form terlebih dahulu.");
}

require_once 'koneksi.php';

$nim = trim($_POST['nim'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$angkatan = filter_input(INPUT_POST, 'angkatan', FILTER_VALIDATE_INT);
$ipk = filter_input(INPUT_POST, 'ipk', FILTER_VALIDATE_FLOAT);

if (
    !preg_match('/^[0-9]{5,15}$/', $nim) ||
    strlen($nama) < 3 ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    $prodi === '' ||
    $angkatan === false || $angkatan === null ||
    $angkatan < 2000 || $angkatan > 2100 ||
    $ipk === false || $ipk === null ||
    $ipk < 0 || $ipk > 4
) {
    exit("Data tidak valid. Periksa kembali isian form.");
}

$stmt = mysqli_prepare(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, prodi, angkatan, ipk)
    VALUES (?, ?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssssid",
    $nim,
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk
);

try {
    if (mysqli_stmt_execute($stmt)) {
        echo "Data berhasil disimpan.";
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        echo "NIM atau email sudah terdaftar. Gunakan data lain.";
    } else {
        echo "Data gagal disimpan.";
    }
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>