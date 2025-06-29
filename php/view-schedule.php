<?php
include 'db.php';

$dept_id = intval($_POST['dept_id']);
$lab_id = intval($_POST['lab_id']);

$sql = "SELECT * FROM LABSHEDULING WHERE Department_ID = $dept_id AND Lab_ID = $lab_id ORDER BY Date, TimeSlot";
$result = mysqli_query($conn, $sql);

echo '<!DOCTYPE html><html><head><title>Lab Schedule</title>';
echo '<link rel="stylesheet" href="../assets/styles.css"></head><body class="dashboard-background">';
echo '<div class="dashboard-container">';
echo "<h2>Schedule for Lab $lab_id (Department $dept_id)</h2>";

if (mysqli_num_rows($result) > 0) {
    echo '<table border="1" style="width:100%; border-collapse: collapse;">';
    echo '<tr><th>Date</th><th>Time Slot</th><th>Status</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        $date = $row['Date'];
        $time = $row['TimeSlot'];
        $status = $row['IsBooked'] ? 'Booked' : 'Available';

        echo "<tr><td>$date</td><td>$time</td><td>$status</td></tr>";
    }
    echo '</table>';
} else {
    echo '<p>No schedule found for this lab.</p>';
}

echo '<br><a href="../pages/labto-dashboard.html" class="tab-button">🔙 Back to Dashboard</a>';
echo '</div></body></html>';
?>
