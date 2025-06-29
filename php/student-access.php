<?php
include 'db.php';

$log_id = intval($_POST['log_id']);
$dept_id = intval($_POST['dept_id']);
$lab_id = intval($_POST['lab_id']);
$student_id = intval($_POST['student_id']);
$checkin = mysqli_real_escape_string($conn, $_POST['checkin']);
$checkout = mysqli_real_escape_string($conn, $_POST['checkout']);

$sql = "INSERT INTO STUDENTLABACCESS (Log_ID, Department_ID, Lab_ID, StudentID, CheckinTime, CheckoutTime)
        VALUES ($log_id, $dept_id, $lab_id, $student_id, '$checkin', '$checkout')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../pages/student-access.html?success=1");
    exit();
} else {
    header("Location: ../pages/student-access.html?success=0");
    exit();
}
?>
