<?php
include 'db.php';
$dept = $_POST['dept_id'];
$lab = $_POST['lab_id'];
$booking = $_POST['booking_id'];
$log = $_POST['log_id'];

$sql = "INSERT INTO LABUSAGELOG (Department_ID, Lab_ID, Log_ID, Booking_ID)
        VALUES ($dept, $lab, $log, $booking)";
if (mysqli_query($conn, $sql)) {
  echo "Usage logged.";
} else {
  echo "Error: " . mysqli_error($conn);
}
?>