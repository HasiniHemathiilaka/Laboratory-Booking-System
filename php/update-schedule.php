<?php
include 'db.php';
$dept = $_POST['dept_id'];
$lab = $_POST['lab_id'];
$date = $_POST['date'];
$slot = $_POST['timeslot'];
$booked = $_POST['isbooked'];

$sql = "INSERT INTO LABSHEDULING (Department_ID, Lab_ID, Date, TimeSlot, IsBooked)
        VALUES ('$dept', '$lab', '$date', '$slot', '$booked')";
if (mysqli_query($conn, $sql)) {
  echo "Schedule added.";
} else {
  echo "Error: " . mysqli_error($conn);
}
?>