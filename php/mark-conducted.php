<?php
include 'db.php';

$booking_id = intval($_POST['booking_id']);
$schedule_id = intval($_POST['schedule_id']);

// Check if already conducted
$check_sql = "SELECT * FROM LABCONDUCTS WHERE Booking_ID = $booking_id AND SheduleID = $schedule_id";
$check_result = mysqli_query($conn, $check_sql);

echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mark Lab Conducted Result</title>
  <link rel="stylesheet" href="../assets/styles.css">
</head>
<body class="dashboard-background">
  <div class="dashboard-container">';

if (mysqli_num_rows($check_result) > 0) {
    echo "<h2 style='color: #cc0000;'>❌ This lab session is already marked as conducted.</h2>";
} else {
    $insert_sql = "INSERT INTO LABCONDUCTS (Booking_ID, SheduleID) VALUES ($booking_id, $schedule_id)";
    if (mysqli_query($conn, $insert_sql)) {
        echo "<h2 style='color: #007f5f;'>✅ Lab successfully marked as conducted!</h2>";
    } else {
        echo "<h2 style='color: #cc0000;'>❌ Error: " . mysqli_error($conn) . "</h2>";
    }
}

// Styled return button
echo '<div style="margin-top: 30px;">
        <a href="../pages/labto-dashboard.html" class="tab-button">🔙 Back to Dashboard</a>
      </div>';

echo '</div></body></html>';
?>
