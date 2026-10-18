<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    header("Location: index.php");
    exit;
}

$nim = trim($_GET['nim'] ?? '');

if ($nim === '' || !ctype_digit($nim)) {
    exit("NIM tidak valid.");
}

$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM mahasiswa WHERE nim = ?"
);

mysqli_stmt_bind_param($stmt, "s", $nim);

try {
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);

        echo "<script>
            alert('Data mahasiswa berhasil dihapus');
            window.location.href = 'index.php';
        </script>";
    } else {
        mysqli_stmt_close($stmt);

        echo "<script>
            alert('Data mahasiswa tidak ditemukan');
            window.location.href = 'index.php';
        </script>";
    }
} catch (mysqli_sql_exception $e) {
    mysqli_stmt_close($stmt);
    error_log($e->getMessage());

    echo "<script>
        alert('Data gagal dihapus karena terjadi kesalahan database');
        window.location.href = 'index.php';
    </script>";
}
?>