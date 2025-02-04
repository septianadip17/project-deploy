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
  <link rel="icon" href="assets/logo.png" type="image/png">
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
    <h1 class="text-4xl font-extrabold mb-6 text-gray-800">Selamat datang di Aplikasi Data Deployment</h1>
    <p class="text-lg mb-6 w-3/4 mx-auto text-gray-600">Aplikasi ini digunakan untuk mengelola data deployment perangkat yang ada di Bank Permata. Anda dapat menambah, mengedit, atau menghapus data deployment.</p>
    <a href="pages/read.php" class="bg-blue-600 px-8 py-4 rounded-lg text-white text-xl font-semibold hover:bg-blue-700 transition-all">Lihat Data Deployment</a>
  </div>

  <!-- Data Deployment Section -->
  <div class="m-12">
    <div class="container mx-auto p-8 shadow-lg rounded-lg bg-white">
      <h2 class="text-3xl font-semibold mb-6 text-black">Data Deployment</h2>

      <?php if ($result->num_rows > 0): ?>
        <div class="overflow-x-auto mb-6">
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
  </div>
  <!-- End of Data Deployment Section -->

  <!-- Footer Section -->
  <footer class="bg-gradient-to-r from-indigo-400 via-purple-400 py-8 text-white mt-auto">
    <div class="container mx-auto flex flex-col items-center justify-center text-center md:flex-row md:justify-between md:items-center">

      <!-- Logo Permata -->
      <div>
        <a href="https://www.permatabank.com/" target="_blank">
          <img class="w-28 mb-4 md:mb-0" src="assets/logo_lotus.png" alt="Permata Logo" />
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
          <img src="assets/nomina_logo.png" alt="Nomina Logo" class="w-28 mb-4 md:mb-0 md:mr-4 shadow-lg" />
        </a>
      </div>
    </div>
  </footer>

</body>

</html>

<?php
$conn->close();
?>