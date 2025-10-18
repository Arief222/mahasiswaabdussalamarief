<?php
include 'koneksi.php';

// Ambil data jurusan untuk dropdown
$queryJurusan = "SELECT * FROM jurusan ORDER BY nama ASC";
$resultJurusan = mysqli_query($koneksi, $queryJurusan);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-gray-800/90 backdrop-blur-md shadow-2xl rounded-2xl w-full max-w-md p-8 border border-gray-700">
    <h2 class="text-2xl font-semibold text-center text-white mb-6">Tambah Mahasiswa</h2>
    
    <form action="simpan_mahasiswa.php" method="POST" class="space-y-4">
      <!-- Nama -->
      <div>
        <label class="block text-gray-300 mb-1">Nama Mahasiswa</label>
        <input type="text" name="nama" required 
               class="w-full px-3 py-2 rounded-lg border border-gray-600 bg-gray-700 text-gray-100 
                      focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
      </div>

      <!-- Jurusan -->
      <div>
        <label class="block text-gray-300 mb-1">Jurusan</label>
        <select name="jurusan_id" required
                class="w-full px-3 py-2 rounded-lg border border-gray-600 bg-gray-700 text-gray-100 
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
          <option value="">-- Pilih Jurusan --</option>
          <?php while ($row = mysqli_fetch_assoc($resultJurusan)): ?>
            <option value="<?= $row['id']; ?>"><?= htmlspecialchars($row['nama']); ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <!-- Umur -->
      <div>
        <label class="block text-gray-300 mb-1">Umur</label>
        <input type="number" name="umur" required min="16" max="99"
               class="w-full px-3 py-2 rounded-lg border border-gray-600 bg-gray-700 text-gray-100 
                      focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
      </div>

      <!-- Tombol -->
      <div class="flex justify-between mt-6">
        <a href="index.php" 
           class="px-4 py-2 bg-gray-700 text-gray-200 rounded-lg hover:bg-gray-600 transition font-medium">
           ← Kembali
        </a>
        <button type="submit" 
                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg transition font-medium">
          💾 Simpan
        </button>
      </div>
    </form>
  </div>

</body>
</html>
