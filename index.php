<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">

    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-orange-500 mb-6 text-center">Data Mahasiswa</h1>

        <!-- Tombol Tambah -->
        <div class="flex justify-end mb-4">
            <a href="tambah.php" 
               class="bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded shadow-md transition">
                + Tambah Mahasiswa
            </a>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-700 rounded-lg overflow-hidden shadow-md">
                <thead class="bg-orange-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Nama</th>
                        <th class="py-3 px-4 text-left">Jurusan</th>
                        <th class="py-3 px-4 text-left">Umur</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800">
                    <?php
                    // Ambil data dari tabel
                    $result = mysqli_query($koneksi, "SELECT * FROM db_mahasiswa ORDER BY id_mahasiswa ASC");

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                                <td class="py-3 px-4"><?= htmlspecialchars($row['id_mahasiswa']); ?></td>
                                <td class="py-3 px-4"><?= htmlspecialchars($row['nama_mahasiswa']); ?></td>
                                <td class="py-3 px-4"><?= htmlspecialchars($row['jurusan_mahasiswa']); ?></td>
                                <td class="py-3 px-4"><?= htmlspecialchars($row['umur_mahasiswa']); ?></td>
                                <td class="py-3 px-4 text-center">
                                    <!-- Tombol Edit -->
                                    <a href="edit.php?id=<?= urlencode($row['id_mahasiswa']); ?>" 
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded mr-2 transition">
                                        Edit
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <a href="hapus.php?id=<?= urlencode($row['id_mahasiswa']); ?>" 
                                       onclick="return confirm('Yakin ingin menghapus data ini?')" 
                                       class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded transition">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='5' class='py-4 px-4 text-center text-gray-400'>Tidak ada data mahasiswa.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
