<?php
include 'db.php';

$dept_id = intval($_POST['dept_id']);
$lab_id = intval($_POST['lab_id']);

// Query all equipment
$equipment_sql = "SELECT Equipment_ID, Equipment_name FROM LAB_EQUIPMENT";
$equipment_result = mysqli_query($conn, $equipment_sql);

echo '<!DOCTYPE html><html><head><title>Availability</title>';
echo '<link rel="stylesheet" href="../assets/styles.css"></head><body class="dashboard-background">';
echo '<div class="dashboard-container">';
echo "<h2>Equipment Availability in Lab $lab_id (Dept $dept_id)</h2>";
echo '<table border="1" style="width:100%; border-collapse: collapse;">';
echo '<tr><th>Equipment Name</th><th>Condition</th><th>Availability</th></tr>';

while ($row = mysqli_fetch_assoc($equipment_result)) {
    $eid = $row['Equipment_ID'];
    $ename = $row['Equipment_name'];

    $query = "SELECT Equipment_Condition FROM LABEQUIPMENTEXISTENCY 
              WHERE Department_ID = $dept_id AND Lab_ID = $lab_id AND Equipment_ID = $eid";
    $exist_result = mysqli_query($conn, $query);
    
    if ($exist_row = mysqli_fetch_assoc($exist_result)) {
        $condition = $exist_row['Equipment_Condition'];
        $availability = 'Available';
    } else {
        $condition = '-';
        $availability = 'Not Available';
    }

    echo "<tr>
            <td>$ename</td>
            <td>$condition</td>
            <td>$availability</td>
          </tr>";
}

echo '</table>';
echo '<br><a href="../pages/labto-dashboard.html" class="tab-button">🔙 Back to Dashboard</a>';
echo '</div></body></html>';
?>
