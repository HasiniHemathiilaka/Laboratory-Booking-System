<?php
include 'db.php';

$instructor_id = $_POST['instructor_id'];

$sql = "SELECT Booking_ID, BookingDate, StartingTime, EndTime, Student_Capacity, Status 
        FROM LABBOOKING 
        WHERE Instructor_ID = $instructor_id 
        ORDER BY BookingDate DESC";

echo "<div style='font-family: Segoe UI, sans-serif; padding: 20px; background-color: #000; color: white;'>";

if (mysqli_num_rows($result = mysqli_query($conn, $sql)) > 0) {
  echo "<h2 style='text-align:center; color:#66ccff;'>Booking Status for Instructor ID: $instructor_id</h2>";
  echo "<table style='border-collapse: collapse; width: 100%; margin-top: 20px; color: white;'>
          <tr style='background-color: #333333; color: #ffffff;'>
            <th style='padding: 12px; border: 1px solid #555;'>Booking ID</th>
            <th style='padding: 12px; border: 1px solid #555;'>Date</th>
            <th style='padding: 12px; border: 1px solid #555;'>Time</th>
            <th style='padding: 12px; border: 1px solid #555;'>Capacity</th>
            <th style='padding: 12px; border: 1px solid #555;'>Status</th>
          </tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr style='text-align: center; background-color: #1a1a1a;'>
            <td style='padding: 10px; border: 1px solid #555;'>{$row['Booking_ID']}</td>
            <td style='padding: 10px; border: 1px solid #555;'>{$row['BookingDate']}</td>
            <td style='padding: 10px; border: 1px solid #555;'>{$row['StartingTime']} - {$row['EndTime']}</td>
            <td style='padding: 10px; border: 1px solid #555;'>{$row['Student_Capacity']}</td>
            <td style='padding: 10px; border: 1px solid #555;'>{$row['Status']}</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "<p style='text-align: center; color: #ff6666;'>No bookings found for Instructor ID: $instructor_id</p>";
}

// Add a "Back to View Page" button
echo "<div style='text-align:center; margin-top:30px;'>
        <a href='../pages/view-status.html' style='
          background-color: #4da6ff;
          color: white;
          padding: 10px 20px;
          text-decoration: none;
          border-radius: 6px;
          font-weight: bold;
          font-size: 16px;
          display: inline-block;
          box-shadow: 0 4px 10px rgba(0,0,0,0.4);'>
          🔁 Search Another ID
        </a>
      </div>";

echo "</div>";
?>
