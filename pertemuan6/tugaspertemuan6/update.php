<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$nim = trim($_POST['nim'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$angkatan = trim($_POST['angkatan'] ?? '');
$ipk = trim($_POST['ipk'] ?? '');

if (
    $nim === '' ||
    $nama === '' ||
    $email === '' ||
    $prodi === '' ||
    $angkatan === '' ||
    $ipk === ''
) {
    exit("Semua kolom wajib diisi.");
}

if (!ctype_digit($nim)) {
    exit("NIM harus berupa angka.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Format email tidak valid.");
}

if (
    !ctype_digit($angkatan) ||
    (int)$angkatan < 2000 ||
    (int)$angkatan > 2099
) {
    exit("Angkatan harus antara 2000 dan 2099.");
}

if (!is_numeric($ipk) || (float)$ipk < 0 || (float)$ipk > 4) {
    exit("IPK harus berada antara 0 dan 4.");
}

$stmt = mysqli_prepare(
    $koneksi,
    "UPDATE mahasiswa
     SET nama = ?, email = ?, prodi = ?, angkatan = ?, ipk = ?
     WHERE nim = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssssds",
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk,
    $nim
);

try {
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);

        echo "<script>
            alert('Data mahasiswa berhasil diubah');
            window.location.href = 'index.php';
        </script>";
    }
} catch (mysqli_sql_exception $e) {
    mysqli_stmt_close($stmt);

    if ($e->getCode() == 1062) {
        exit("Email sudah digunakan oleh mahasiswa lain.");
    }

    error_log($e->getMessage());
    exit("Data gagal diubah karena terjadi kesalahan database.");
}
?>