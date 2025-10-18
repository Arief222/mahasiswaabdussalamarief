<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan di URL!'); window.location='index.php';</script>";
    exit;
}

$id = intval($_GET['id']); // pastikan ID berupa angka

// Cek apakah ID ada
$cek = mysqli_query($koneksi, "SELECT * FROM db_mahasiswa WHERE id_mahasiswa = $id");
if (!$cek || mysqli_num_rows($cek) == 0) {
    echo "<script>alert('Data dengan ID $id tidak ditemukan di database!'); window.location='index.php';</script>";
    exit;
}

// Proses hapus data
$query = mysqli_query($koneksi, "DELETE FROM db_mahasiswa WHERE id_mahasiswa = $id");

if ($query) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
}
?>
