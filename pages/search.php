<?php
include '../config/database.php'; 

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM deployment WHERE 
        no_uat LIKE '%$search%' OR 
        alamat_kantor LIKE '%$search%' OR 
        nama_user LIKE '%$search%' OR 
        nama_engineer LIKE '%$search%' ";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Data Deployment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4">
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-center text-gray-700">Pencarian Data Deployment</h2>
        <form method="GET" class="mb-4 flex gap-2 justify-center">
            <input type="text" name="search" placeholder="Cari data..." value="<?= htmlspecialchars($search) ?>" 
                class="border p-2 w-80 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Cari</button>
        </form>

        <?php if ($result->num_rows > 0): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white table-auto border border-gray-300 rounded-lg">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="py-2 px-4 text-left">No UAT</th>
                        <th class="py-2 px-4 text-left">Alamat Kantor</th>
                        <th class="py-2 px-4 text-left">Nama User</th>
                        <th class="py-2 px-4 text-left">Nama Engineer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr class="border-b hover:bg-gray-100 transition-all">
                        <td class="py-2 px-4"> <?= $row['no_uat'] ?> </td>
                        <td class="py-2 px-4"> <?= $row['alamat_kantor'] ?> </td>
                        <td class="py-2 px-4"> <?= $row['nama_user'] ?> </td>
                        <td class="py-2 px-4"> <?= $row['nama_engineer'] ?> </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p class="text-center text-gray-500">Tidak ada hasil ditemukan.</p>
        <?php endif; ?>
    </div>
</body>
</html>