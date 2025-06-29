<?php
include 'db.php';

$booking_id = intval($_POST['booking_id']);
$new_status = $_POST['new_status'];

$sql = "UPDATE LABBOOKING SET Status = '$new_status' WHERE Booking_ID = $booking_id";

if (mysqli_query($conn, $sql)) {
    header("Location: ../pages/manage-bookings.html?success=1");
} else {
    header("Location: ../pages/manage-bookings.html?success=0");
}
exit();
?>
