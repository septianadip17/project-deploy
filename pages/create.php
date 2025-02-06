<?php
include "../config/database.php";

// Fungsi untuk redirect
function redirect($url)
{
    header("Location: $url");
    exit;
}

function checkIfNoUatExists($conn, $no_uat)
{
    $check_sql = "SELECT * FROM deployment WHERE no_uat = '$no_uat'";
    return $conn->query($check_sql);
}

function addDeploymentData($conn, $no_uat, $alamat_kantor, $nama_user, $nama_engineer, $deploy_iso, $tipe_perangkat, $tanggal_pengerjaan)
{
    $sql = "INSERT INTO deployment (no_uat, alamat_kantor, nama_user, nama_engineer, deploy_iso, tipe_perangkat, tanggal_pengerjaan) 
            VALUES ('$no_uat', '$alamat_kantor', '$nama_user', '$nama_engineer', '$deploy_iso', '$tipe_perangkat', '$tanggal_pengerjaan')";

    return $conn->query($sql);
}

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_uat = $_POST['no_uat'];
    $alamat_kantor = $_POST['alamat_kantor'];
    $nama_user = $_POST['nama_user'];
    $nama_engineer = $_POST['nama_engineer'];
    $deploy_iso = $_POST['deploy_iso'];
    $tipe_perangkat = $_POST['tipe_perangkat'];
    $tanggal_pengerjaan = $_POST['tanggal_pengerjaan'];

    $result = checkIfNoUatExists($conn, $no_uat);

    if ($result->num_rows > 0) {
        $error_message = "No UAT sudah terdaftar!";
    } else {
        if (addDeploymentData($conn, $no_uat, $alamat_kantor, $nama_user, $nama_engineer, $deploy_iso, $tipe_perangkat, $tanggal_pengerjaan)) {
            redirect('read.php');
        } else {
            $error_message = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="icon" href="../assets/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-blue-50 via-indigo-50 to-blue-100 flex justify-center items-center h-screen">
    <div class="mx-auto m-3">
        <div class="m-2 bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Tambah Data Deployment</h2>
            <?php
            if (isset($error_message)) {
                echo "<div class='bg-red-500 text-white p-3 rounded mb-4 text-center'>$error_message</div>";
            }
            ?>

            <form method="POST" action="">
                <div class="space-y-6">
                    <!-- No UAT -->
                    <div>
                        <label class="block text-lg font-medium text-gray-700">No UAT:</label>
                        <input type="text" name="no_uat" class="w-full px-4 py-2 mt-2 border rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Alamat Kantor -->
                    <div>
                        <label class="block text-lg font-medium text-gray-700">Alamat Kantor:</label>
                        <input type="text" name="alamat_kantor" class="w-full px-4 py-2 mt-2 border rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Nama User -->
                    <div>
                        <label class="block text-lg font-medium text-gray-700">Nama User:</label>
                        <input type="text" name="nama_user" class="w-full px-4 py-2 mt-2 border rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Nama Engineer -->
                    <div>
                        <label class="block text-lg font-medium text-gray-700">Nama Engineer:</label>
                        <input type="text" name="nama_engineer" class="w-full px-4 py-2 mt-2 border rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Deploy ISO -->
                    <div>
                        <label class="block text-lg font-medium text-gray-700">Deploy ISO:</label>
                        <select name="deploy_iso" class="w-full px-4 py-2 mt-2 border rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-400">
                            <option value="upgrade">Upgrade</option>
                            <option value="update">Update</option>
                        </select>
                    </div>

                    <!-- Tipe Perangkat -->
                    <div>
                        <label class="block text-lg font-medium text-gray-700">Tipe Perangkat:</label>
                        <select name="tipe_perangkat" class="w-full px-4 py-2 mt-2 border rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-400">
                            <option value="PC">PC</option>
                            <option value="Laptop">Laptop</option>
                        </select>
                    </div>

                    <!-- Tanggal Pengerjaan -->
                    <div>
                        <label class="block text-lg font-medium text-gray-700">Tanggal Pengerjaan:</label>
                        <input type="date" name="tanggal_pengerjaan" class="w-full px-4 py-2 mt-2 border rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg mt-4 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">Simpan</button>
                </div>
            </form>

            <a href="read.php" class="block text-center mt-6 text-indigo-600 hover:underline">Kembali ke Data Deployment</a>
        </div>
    </div>
</body>

</html>