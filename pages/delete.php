<?php
include "../config/database.php";

if (isset($_GET['no_uat'])) {
    $no_uat = $_GET['no_uat'];
    $sql = "DELETE FROM deployment WHERE no_uat='$no_uat'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='read.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
