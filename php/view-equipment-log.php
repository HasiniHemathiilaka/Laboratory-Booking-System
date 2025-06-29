<?php
include 'db.php';

$lab_id = intval($_POST['lab_id']);
$equipment_id = intval($_POST['equipment_id']);

$sql = "SELECT * FROM LABEQUIPMENTUSAGE 
        WHERE Lab_ID = $lab_id AND Equipment_ID = $equipment_id";

$result = mysqli_query($conn, $sql);

echo '<!DOCTYPE html><html><head><title>Equipment Usage Log</title>';
echo '<link rel="stylesheet" href="../assets/styles.css"></head><body class="dashboard-background">';
echo '<div class="dashboard-container">';
echo "<h2>Usage Log for Equipment $equipment_id in Lab $lab_id</h2>";

if (mysqli_num_rows($result) > 0) {
    echo '<table border="1" style="width:100%; border-collapse: collapse;">';
    echo '<tr><th>Log ID</th><th>Department ID</th><th>Condition</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['Log_ID']}</td>
                <td>{$row['Department_ID']}</td>
                <td>{$row['HandOveringCondition']}</td>
              </tr>";
    }
    echo '</table>';
} else {
    echo '<p>No usage records found.</p>';
}
echo '<br><a href="../pages/labto-dashboard.html" class="tab-button">🔙 Back to Dashboard</a>';
echo '</div></body></html>';
?>
