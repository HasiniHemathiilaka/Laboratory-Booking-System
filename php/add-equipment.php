<?php
include 'db.php';
$name = $_POST['equipment_name'];
$sql = "INSERT INTO LAB_EQUIPMENT (Equipment_name) VALUES ('$name')";
if (mysqli_query($conn, $sql)) {
  echo "Equipment added successfully.";
} else {
  echo "Error: " . mysqli_error($conn);
}
?>