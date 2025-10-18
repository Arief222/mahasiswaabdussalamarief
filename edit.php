<?php
include 'koneksi.php';

// Ambil ID dari parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data mahasiswa berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM db_mahasiswa WHERE id_mahasiswa = $id");
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">

<div class="max-w-md mx-auto mt-10 bg-gray-800 p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-orange-500 mb-6 text-center">Edit Data Mahasiswa</h2>

    <form method="POST">
        <div class="mb-4">
            <label class="block mb-2">Nama Mahasiswa</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama_mahasiswa']) ?>" 
                required class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-orange-500">
        </div>

        <div class="mb-4">
            <label class="block mb-2">Jurusan</label>
            <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan_mahasiswa']) ?>" 
                required class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-orange-500">
        </div>

        <div class="mb-6">
            <label class="block mb-2">Umur</label>
            <input type="number" name="umur" value="<?= htmlspecialchars($data['umur_mahasiswa']) ?>" 
                required class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-orange-500">
        </div>

        <div class="flex justify-between">
            <a href="index.php" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded">Kembali</a>
            <button type="submit" name="update" class="bg-orange-600 hover:bg-orange-700 text-white py-2 px-4 rounded">Update</button>
        </div>
    </form>

    <?php
    // Saat tombol update diklik
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $umur = $_POST['umur'];

        // Query update data mahasiswa
        $update = mysqli_query($koneksi, "UPDATE db_mahasiswa 
            SET nama_mahasiswa='$nama', jurusan_mahasiswa='$jurusan', umur_mahasiswa='$umur' 
            WHERE id_mahasiswa=$id");

        if ($update) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data!');</script>";
        }
    }
    ?>
</div>

</body>
</html>
