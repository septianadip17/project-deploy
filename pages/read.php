<?php
include "../config/database.php";

$sql = "SELECT * FROM deployment";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Deployment</title>
  <link rel="icon" href="../assets/logo.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="bg-white p-5 shadow-md text-white">
    <div class="container mx-auto flex justify-between items-center">
      <a href="../index.php" class="font-bold text-2xl flex items-center space-x-2">
        <img class="h-14" src="../assets/permata_logo.png" alt="logo bank permata">
      </a>
      <a href="create.php" class="bg-green-500 px-6 py-3 rounded-lg text-white text-sm font-semibold hover:bg-green-600 transition-all">Tambah Data Baru</a>
    </div>
  </nav>

  <!-- Table to display data -->
  <div class="container mx-auto p-4 sm:p-8 m-6 bg-white shadow-xl rounded-lg border border-gray-200 h-screen">
    <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-6">Data Deployment</h1>

    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border-collapse">
        <thead>
          <tr class="bg-gradient-to-r from-blue-500 to-green-500 text-white">
            <th class="border border-gray-300 px-4 py-2 sm:px-6 sm:py-3 text-left">No UAT</th>
            <th class="border border-gray-300 px-4 py-2 sm:px-6 sm:py-3 text-left">Alamat Kantor</th>
            <th class="border border-gray-300 px-4 py-2 sm:px-6 sm:py-3 text-left">Nama User</th>
            <th class="border border-gray-300 px-4 py-2 sm:px-6 sm:py-3 text-left">Nama Engineer</th>
            <th class="border border-gray-300 px-4 py-2 sm:px-6 sm:py-3 text-left">Deploy ISO</th>
            <th class="border border-gray-300 px-4 py-2 sm:px-6 sm:py-3 text-left">Tipe Perangkat</th>
            <th class="border border-gray-300 px-4 py-2 sm:px-6 sm:py-3 text-left">Tanggal Pengerjaan</th>
            <th class="border border-gray-300 px-4 py-2 sm:px-6 sm:py-3 text-left">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()) { ?>
            <tr class="hover:bg-gray-50 transition duration-200">
              <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['no_uat']; ?></td>
              <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['alamat_kantor']; ?></td>
              <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['nama_user']; ?></td>
              <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['nama_engineer']; ?></td>
              <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['deploy_iso']; ?></td>
              <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['tipe_perangkat']; ?></td>
              <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['tanggal_pengerjaan']; ?></td>
              <td class="border px-4 py-2 sm:px-6 sm:py-4 flex flex-col sm:flex-row gap-2 justify-center">
                <a href="update.php?no_uat=<?= $row['no_uat']; ?>" class="bg-yellow-500 text-white px-3 py-1 rounded-lg shadow-md hover:bg-yellow-600 transition text-xs sm:text-sm">Edit</a>
                <a href="delete.php?no_uat=<?= $row['no_uat']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="bg-red-500 text-white px-3 py-1 rounded-lg shadow-md hover:bg-red-600 transition text-xs sm:text-sm">Hapus</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>


  <!-- Footer Section -->
  <footer class="bg-gradient-to-r from-blue-400 via-green-400 py-8 text-white mt-auto">
    <div class="container mx-auto flex flex-col items-center justify-center text-center md:flex-row md:justify-between md:items-center">

      <!-- Logo Permata -->
      <div>
        <a href="https://www.permatabank.com/" target="_blank">
          <img class="w-28 mb-4 md:mb-0" src="../assets/logo_lotus.png" alt="Permata Logo" />
        </a>
      </div>

      <!-- Text Footer -->
      <div class="flex flex-col items-center text-sm md:flex-row md:items-center md:space-x-4 mb-4 md:mb-0">
        <div class="mb-4 ">
          <p class="text-md">Septian 2025</p>
        </div>

        <!-- Social Media Links -->
        <div class="flex flex-col items-center w-full space-y-4">
          <a href="https://github.com/septianadip17/" target="_blank" class="text-white hover:text-gray-200 w-full text-center">Github</a>
          <a href="https://www.linkedin.com/in/septianadip17/" target="_blank" class="text-white hover:text-gray-200 w-full text-center">Linkedin</a>
          <a href="https://wa.me/6289696135242" target="_blank" class="text-white hover:text-gray-200 w-full text-center">WhatsApp</a>
        </div>
      </div>

      <!-- Logo Nomina -->
      <div>
        <a href="https://www.nominatix.com/" target="_blank">
          <img src="../assets/nomina_logo.png" alt="Nomina Logo" class="w-28 mb-4 md:mb-0 md:mr-4 shadow-lg" />
        </a>
      </div>
    </div>
  </footer>


</body>

</html>