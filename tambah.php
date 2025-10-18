<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-gray-800/90 backdrop-blur-md shadow-2xl rounded-2xl w-full max-w-lg p-8 border border-gray-700">
    <h2 class="text-2xl font-semibold text-center text-white mb-6">🧾 Form Tambah Mahasiswa</h2>

    <form action="simpan_mahasiswa.php" method="POST" class="space-y-5">

      <!-- Nama -->
      <div>
        <label for="nama_mahasiswa" class="block text-gray-300 mb-2 font-medium">Nama Mahasiswa</label>
        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan nama mahasiswa" required
               class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-gray-100 
                      focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
      </div>

      <!-- Jurusan -->
      <div>
        <label for="jurusan_mahasiswa" class="block text-gray-300 mb-2 font-medium">Jurusan</label>
        <input type="text" id="jurusan_mahasiswa" name="jurusan_mahasiswa" placeholder="Masukkan jurusan" required
               class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-gray-100 
                      focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
      </div>

      <!-- Umur -->
      <div>
        <label for="umur_mahasiswa" class="block text-gray-300 mb-2 font-medium">Umur</label>
        <input type="number" id="umur_mahasiswa" name="umur_mahasiswa" min="16" max="99" placeholder="Masukkan umur" required
               class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-gray-100 
                      focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
      </div>

      <!-- Aksi -->
      <div class="flex justify-between pt-4">
        <a href="index.php" 
           class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-gray-200 rounded-lg transition font-medium">
          ← Batal
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
