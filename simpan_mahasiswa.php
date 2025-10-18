<?php
include 'koneksi.php';

// Ambil data dari form
$nama   = $_POST['nama_mahasiswa'];
$jurusan = $_POST['jurusan_mahasiswa'];
$umur   = $_POST['umur_mahasiswa'];

// Query untuk simpan data ke tabel db_mahasiswa
$query = "INSERT INTO db_mahasiswa (nama_mahasiswa, jurusan_mahasiswa, umur_mahasiswa) 
          VALUES ('$nama', '$jurusan', '$umur')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>
            alert('Data mahasiswa berhasil disimpan!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');
            window.history.back();
          </script>";
}

mysqli_close($koneksi);
?>
