<?php
include 'db.php';
session_start();
$labto_id = $_SESSION['user']['User_ID'];

$query = "SELECT B.Booking_ID, B.BookingDate, B.StartingTime, B.EndTime, B.Status, L.Lab_ID, L.Department_ID
          FROM LABBOOKING B
          JOIN LABS L ON L.LabTO_ID = $labto_id
          JOIN LABSHEDULING S ON S.Lab_ID = L.Lab_ID AND S.Department_ID = L.Department_ID
          WHERE B.Status = 'Pending'";

$result = mysqli_query($conn, $query);

echo "<table border='1'><tr><th>Booking ID</th><th>Date</th><th>Time</th><th>Status</th><th>Lab ID</th><th>Dept</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['Booking_ID']}</td>
            <td>{$row['BookingDate']}</td>
            <td>{$row['StartingTime']} - {$row['EndTime']}</td>
            <td>{$row['Status']}</td>
            <td>{$row['Lab_ID']}</td>
            <td>{$row['Department_ID']}</td>
          </tr>";
}
echo "</table>";
?>
