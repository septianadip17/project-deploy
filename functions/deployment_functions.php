<?php
include '../config/database.php';

function getDeploymentData()
{
  global $conn;
  $sql = "SELECT * FROM deployment";
  return $conn->query($sql);
}

?>

<?php
function deleteDeployment($no_uat)
{
  global $conn;
  $no_uat = $conn->real_escape_string($no_uat);
  $sql = "DELETE FROM deployment WHERE no_uat='$no_uat'";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href='read.php';</script>";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

