<?php
include '../config/database.php';

function getDeploymentData($search = '') {
    global $conn;
    
    $search = $conn->real_escape_string($search);
    $sql = "SELECT * FROM deployment WHERE 
            no_uat LIKE '%$search%' OR 
            alamat_kantor LIKE '%$search%' OR 
            nama_user LIKE '%$search%' OR 
            nama_engineer LIKE '%$search%'";
    
    return $conn->query($sql);
}
?>
