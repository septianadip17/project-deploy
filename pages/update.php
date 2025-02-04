<?php
include "../config/database.php";

// Ambil data berdasarkan no_uat
if (isset($_GET['no_uat'])) {
    $no_uat = $_GET['no_uat'];
    $sql = "SELECT * FROM deployment WHERE no_uat='$no_uat'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alamat_kantor = $_POST['alamat_kantor'];
    $nama_user = $_POST['nama_user'];
    $nama_engineer = $_POST['nama_engineer'];
    $deploy_iso = $_POST['deploy_iso'];
    $tipe_perangkat = $_POST['tipe_perangkat'];
    $tanggal_pengerjaan = $_POST['tanggal_pengerjaan'];

    $sql = "UPDATE deployment SET 
                alamat_kantor='$alamat_kantor', 
                nama_user='$nama_user', 
                nama_engineer='$nama_engineer', 
                deploy_iso='$deploy_iso', 
                tipe_perangkat='$tipe_perangkat', 
                tanggal_pengerjaan='$tanggal_pengerjaan' 
            WHERE no_uat='$no_uat'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='read.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Edit Data Deployment</h2>
        <form method="POST" action="">
            <label class="block mb-2">Alamat Kantor:</label>
            <input type="text" name="alamat_kantor" value="<?= $data['alamat_kantor']; ?>" class="w-full px-4 py-2 border rounded-lg" required>

            <label class="block mt-3 mb-2">Nama User:</label>
            <input type="text" name="nama_user" value="<?= $data['nama_user']; ?>" class="w-full px-4 py-2 border rounded-lg" required>

            <label class="block mt-3 mb-2">Nama Engineer:</label>
            <input type="text" name="nama_engineer" value="<?= $data['nama_engineer']; ?>" class="w-full px-4 py-2 border rounded-lg" required>

            <label class="block mt-3 mb-2">Deploy ISO:</label>
            <select name="deploy_iso" class="w-full px-4 py-2 border rounded-lg">
                <option value="upgrade" <?= ($data['deploy_iso'] == 'upgrade') ? 'selected' : ''; ?>>Upgrade</option>
                <option value="update" <?= ($data['deploy_iso'] == 'update') ? 'selected' : ''; ?>>Update</option>
            </select>

            <label class="block mt-3 mb-2">Tipe Perangkat:</label>
            <select name="tipe_perangkat" class="w-full px-4 py-2 border rounded-lg">
                <option value="PC" <?= ($data['tipe_perangkat'] == 'PC') ? 'selected' : ''; ?>>PC</option>
                <option value="Laptop" <?= ($data['tipe_perangkat'] == 'Laptop') ? 'selected' : ''; ?>>Laptop</option>
            </select>

            <label class="block mt-3 mb-2">Tanggal Pengerjaan:</label>
            <input type="date" name="tanggal_pengerjaan" value="<?= $data['tanggal_pengerjaan']; ?>" class="w-full px-4 py-2 border rounded-lg" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update</button>
        </form>
    </div>
</body>
</html>
