<?php
include 'db.php';

/* Fetch the latest bookings (newest date first) */
$sql = "
    SELECT
        Booking_ID,
        Department_ID,
        Lab_ID,
        Instructor_ID,
        Lecture_ID,
        BookingDate,
        StartingTime,
        EndTime,
        Student_Capacity,
        Status
    FROM LABBOOKING
    ORDER BY BookingDate DESC
";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

/* Table output */
echo "<table border='1' style='width:100%; border-collapse:collapse; font-size:15px; color:white;'>";
echo "<tr>
        <th>Booking ID</th>
        <th>Department ID</th>
        <th>Lab ID</th>
        <th>Instructor ID</th>
        <th>Lecture ID</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Capacity</th>
        <th>Status</th>
      </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['Booking_ID']}</td>
            <td>{$row['Department_ID']}</td>
            <td>{$row['Lab_ID']}</td>
            <td>{$row['Instructor_ID']}</td>
            <td>{$row['Lecture_ID']}</td>
            <td>{$row['BookingDate']}</td>
            <td>{$row['StartingTime']}</td>
            <td>{$row['EndTime']}</td>
            <td>{$row['Student_Capacity']}</td>
            <td>{$row['Status']}</td>
          </tr>";
}
echo "</table>";

/* Clean up */
mysqli_free_result($result);
mysqli_close($conn);
?>
