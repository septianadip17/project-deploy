<?php
include_once __DIR__ . '/../functions/deployment_functions.php';
include_once __DIR__ . '/../partials/head.php';
include_once __DIR__ . '/../partials/navbar.php';

if (isset($_GET['no_uat'])) {
    $no_uat = $_GET['no_uat'];
    deleteDeployment($no_uat);
}

$result = getDeploymentData();
?>

<div class="container mx-auto p-4 sm:p-8 m-6 bg-white shadow-xl rounded-lg border border-gray-200">
  <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-6">Data Deployment</h1>

  <div class="overflow-x-auto">
    <table class="min-w-full table-auto border-collapse">
      <thead>
        <tr class="bg-gradient-to-r from-blue-500 to-green-500 text-white">
          <th class="border border-gray-300 px-4 py-2 sm:px-6 sm:py-3 text-left">No.</th>
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
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
        ?>
          <tr class="hover:bg-gray-50 transition duration-200">
            <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $no++; ?></td>
            <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['no_uat']; ?></td>
            <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['alamat_kantor']; ?></td>
            <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['nama_user']; ?></td>
            <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['nama_engineer']; ?></td>
            <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['deploy_iso']; ?></td>
            <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['tipe_perangkat']; ?></td>
            <td class="border px-4 py-2 sm:px-6 sm:py-4"><?= $row['tanggal_pengerjaan']; ?></td>
            <td class="border px-4 py-2 sm:px-6 sm:py-4 flex flex-col sm:flex-row gap-2 justify-center">
              <a href="update.php?no_uat=<?= $row['no_uat']; ?>" class="bg-yellow-500 text-white px-3 py-1 rounded-lg shadow-md hover:bg-yellow-600 transition text-xs sm:text-sm">Edit</a>
              <a href="?no_uat=<?= $row['no_uat']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="bg-red-500 text-white px-3 py-1 rounded-lg shadow-md hover:bg-red-600 transition text-xs sm:text-sm">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include_once __DIR__ . '/../partials/footer.php'; ?>
