<?php
require_once 'koneksi.php';

$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

if (mysqli_query($koneksi, $sqlCreateDB)) {
    echo "Database berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error membuat database: " . mysqli_error($koneksi) . "<br>";
}

mysqli_set_charset($koneksi, "utf8mb4");
mysqli_select_db($koneksi, 'akademik');

$sqlCreateTables = [

    "CREATE TABLE IF NOT EXISTS mahasiswa (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nim VARCHAR(15) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE,
        prodi VARCHAR(80) NOT NULL,
        angkatan YEAR NOT NULL,
        ipk DECIMAL(3,2) DEFAULT 0.00
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS dosen (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nidn VARCHAR(20) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS mata_kuliah (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        kode_mk VARCHAR(12) NOT NULL UNIQUE,
        nama_mk VARCHAR(100) NOT NULL,
        sks TINYINT UNSIGNED NOT NULL,
        dosen_id BIGINT UNSIGNED,
        CONSTRAINT fk_mk_dosen
        FOREIGN KEY (dosen_id) REFERENCES dosen(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS fakultas (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        kode_fakultas VARCHAR(10) NOT NULL UNIQUE,
        nama_fakultas VARCHAR(100) NOT NULL
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS kelas (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nama_kelas VARCHAR(50) NOT NULL,
        semester TINYINT UNSIGNED NOT NULL,
        tahun_ajaran VARCHAR(20) NOT NULL
    ) ENGINE=InnoDB"
];

foreach ($sqlCreateTables as $query) {
    if (mysqli_query($koneksi, $query)) {
        echo "Tabel berhasil dibuat atau sudah ada.<br>";
    } else {
        echo "Gagal membuat tabel: "
        . mysqli_error($koneksi) . "<br>";
    }
}

mysqli_close($koneksi);
?>