<?php
include 'db.php';

$log_id = intval($_POST['log_id']);
$dept_id = intval($_POST['dept_id']);
$lab_id = intval($_POST['lab_id']);
$equipment_id = intval($_POST['equipment_id']);
$condition = mysqli_real_escape_string($conn, $_POST['condition']);

$sql = "INSERT INTO LABEQUIPMENTUSAGE (Log_ID, Department_ID, Lab_ID, Equipment_ID, HandOveringCondition)
        VALUES ($log_id, $dept_id, $lab_id, $equipment_id, '$condition')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../pages/log-equipment.html?success=1");
    exit();
} else {
    header("Location: ../pages/log-equipment.html?success=0");
    exit();
}
?>
