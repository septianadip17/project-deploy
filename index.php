<?php
include "config/database.php";

$sql = "SELECT * FROM deployment";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Deployment App</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">

  <!-- Navbar -->
  <nav class="bg-white p-5 shadow-md text-white">
    <div class="container mx-auto flex justify-between items-center">
      <a href="index.php" class="font-bold text-2xl flex items-center space-x-2">
        <img class="h-14" src="assets/permata_logo.png" alt="logo bank permata">
      </a>
      <a href="pages/create.php" class="bg-green-500 px-6 py-3 rounded-lg text-white text-sm font-semibold hover:bg-green-600 transition-all">Tambah Data Baru</a>
    </div>
  </nav>

  <!-- Main Section -->
  <div class="container mx-auto p-8 mt-8 text-center">
    <h1 class="text-4xl font-extrabold mb-6 text-gray-800">Selamat datang di Aplikasi Deployment</h1>
    <p class="text-lg mb-6 text-gray-600">Aplikasi ini digunakan untuk mengelola data deployment perangkat. Anda dapat menambah, mengedit, atau menghapus data deployment.</p>
    <a href="pages/read.php" class="bg-blue-600 px-8 py-4 rounded-lg text-white text-xl font-semibold hover:bg-blue-700 transition-all">Lihat Data Deployment</a>
  </div>

  <!-- Data Deployment Section -->
  <div class="container mx-auto p-8 mt-12  shadow-lg rounded-lg">
    <h2 class="text-3xl font-semibold mb-6 text-black">Data Deployment</h2>

    <?php if ($result->num_rows > 0): ?>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white table-auto border-separate border-spacing-0 rounded-lg shadow-md">
          <thead class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400">
            <tr>
              <th class="py-3 px-6 text-left text-white font-medium">No UAT</th>
              <th class="py-3 px-6 text-left text-white font-medium">Alamat Kantor</th>
              <th class="py-3 px-6 text-left text-white font-medium">Nama User</th>
              <th class="py-3 px-6 text-left text-white font-medium">Nama Engineer</th>
              <th class="py-3 px-6 text-left text-white font-medium">Deploy ISO</th>
              <th class="py-3 px-6 text-left text-white font-medium">Tipe Perangkat</th>
              <th class="py-3 px-6 text-left text-white font-medium">Tanggal Pengerjaan</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr class="hover:bg-gray-100 transition-all">
                <td class="py-4 px-6 text-gray-800 border-b"><?php echo $row['no_uat']; ?></td>
                <td class="py-4 px-6 text-gray-800 border-b"><?php echo $row['alamat_kantor']; ?></td>
                <td class="py-4 px-6 text-gray-800 border-b"><?php echo $row['nama_user']; ?></td>
                <td class="py-4 px-6 text-gray-800 border-b"><?php echo $row['nama_engineer']; ?></td>
                <td class="py-4 px-6 text-gray-800 border-b"><?php echo $row['deploy_iso']; ?></td>
                <td class="py-4 px-6 text-gray-800 border-b"><?php echo $row['tipe_perangkat']; ?></td>
                <td class="py-4 px-6 text-gray-800 border-b"><?php echo $row['tanggal_pengerjaan']; ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <p class="text-lg text-gray-600">Tidak ada data untuk ditampilkan.</p>
    <?php endif; ?>
  </div>


</body>

</html>

<?php
$conn->close();
?>