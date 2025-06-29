<?php
include 'db.php';

$dept_id = intval($_POST['dept_id']);
$lab_id = intval($_POST['lab_id']);
$date = $_POST['date'];
$timeslot = $_POST['timeslot'];
$isbooked = intval($_POST['isbooked']);

$sql = "INSERT INTO LABSHEDULING (Department_ID, Lab_ID, Date, TimeSlot, IsBooked)
        VALUES ($dept_id, $lab_id, '$date', '$timeslot', $isbooked)";

if (mysqli_query($conn, $sql)) {
    header("Location: ../pages/manage-schedule.html?success=1");
    exit();
} else {
    header("Location: ../pages/manage-schedule.html?success=0");
    exit();
}
?>
