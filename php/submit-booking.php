<?php
include 'db.php';

// Sanitize and validate input

$instructor_id = intval($_POST['instructor_id']);
$lecture_id = intval($_POST['lecture_id']);
$Lab_ID = intval($_POST['Lab_ID']);
$Department_ID = mysqli_real_escape_string($conn, $_POST['Department_ID']);
$date = mysqli_real_escape_string($conn, $_POST['booking_date']);
$start = mysqli_real_escape_string($conn, $_POST['start_time']);
$end = mysqli_real_escape_string($conn, $_POST['end_time']);
$capacity = intval($_POST['student_capacity']);

// Check if Instructor and Lecture exist
$checkLecture = mysqli_query($conn, "SELECT Lecture_ID FROM LECTUREINCHARGE WHERE Lecture_ID = $lecture_id");
$checkInstructor = mysqli_query($conn, "SELECT Instructor_ID FROM INSTRUCTOR WHERE Instructor_ID = $instructor_id");

if (mysqli_num_rows($checkLecture) == 0 || mysqli_num_rows($checkInstructor) == 0) {
    header("Location: ../pages/submit-booking.html?success=0");
    exit();
}

// Insert the booking
$sql = "INSERT INTO LABBOOKING (Department_ID,Lab_ID,Instructor_ID, Lecture_ID, BookingDate, StartingTime, EndTime, Student_Capacity, Status)
        VALUES ($Department_ID,$Lab_ID,$instructor_id, $lecture_id, '$date', '$start', '$end', $capacity, 'Pending')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../pages/submit-booking.html?success=1");
} else {
    header("Location: ../pages/submit-booking.html?success=0");
}
exit();
?>
