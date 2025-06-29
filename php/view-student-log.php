<?php
include 'db.php';

$student_id = intval($_POST['student_id']);

$sql = "SELECT * FROM STUDENTLABACCESS WHERE StudentID = $student_id";

$result = mysqli_query($conn, $sql);

echo '<!DOCTYPE html><html><head><title>Student Access Log</title>';
echo '<link rel="stylesheet" href="../assets/styles.css"></head><body class="dashboard-background">';
echo '<div class="dashboard-container">';
echo "<h2>Lab Access Log for Student $student_id</h2>";

if (mysqli_num_rows($result) > 0) {
    echo '<table border="1" style="width:100%; border-collapse: collapse;">';
    echo '<tr><th>Log ID</th><th>Department ID</th><th>Lab ID</th><th>Check-in</th><th>Check-out</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['Log_ID']}</td>
                <td>{$row['Department_ID']}</td>
                <td>{$row['Lab_ID']}</td>
                <td>{$row['CheckinTime']}</td>
                <td>{$row['CheckoutTime']}</td>
              </tr>";
    }
    echo '</table>';
} else {
    echo '<p>No access records found.</p>';
}
echo '<br><a href="../pages/labto-dashboard.html" class="tab-button">🔙 Back to Dashboard</a>';
echo '</div></body></html>';
?>
