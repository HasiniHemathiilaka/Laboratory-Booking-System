<?php
include 'db.php';

$first = $_POST['first'];
$middle = $_POST['middle'];
$last = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

// Insert user into USERS table
$user_sql = "INSERT INTO USERS (FirstName, MidName, LastName, Email, password)
             VALUES ('$first', '$middle', '$last', '$email', '$password')";

echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Registration Result</title>
  <link rel="stylesheet" href="../assets/styles.css"/>
</head>
<body class="dashboard-background">
  <div class="dashboard-container">';

if (mysqli_query($conn, $user_sql)) {
    $user_id = mysqli_insert_id($conn);

    if ($role == 'student') {
        $batch = $_POST['batch'];
        $sql = "INSERT INTO STUDENT (StudentID, Batch) VALUES ($user_id, '$batch')";
    } elseif ($role == 'instructor') {
        $course_id = $_POST['course_id'];
        $sql = "INSERT INTO INSTRUCTOR (Instructor_ID, Coarse_ID) VALUES ($user_id, $course_id)";
    } elseif ($role == 'labto') {
        $skill = $_POST['tech_skill'];
        $sql = "INSERT INTO LABTO (LabTO_ID, Technical_Skill) VALUES ($user_id, '$skill')";
    } elseif ($role == 'lectureincharge') {
        $exp = $_POST['experience'];
        $sql = "INSERT INTO LECTUREINCHARGE (Lecture_ID, YearOfExperience) VALUES ($user_id, $exp)";
    }

    if (mysqli_query($conn, $sql)) {
        echo '<div class="success-box show">✅ Registration successful!</div>';
    } else {
        echo '<div class="success-box show" style="background-color:#ffd6d6; color:#a70000; border-color:#cc0000;">
                ❌ Role-specific data insertion failed: ' . mysqli_error($conn) . '
              </div>';
    }
} else {
    echo '<div class="success-box show" style="background-color:#ffd6d6; color:#a70000; border-color:#cc0000;">
            ❌ Registration failed: ' . mysqli_error($conn) . '
          </div>';
}

// Back to login button
echo '<br><a href="../pages/index.html" class="tab-button">🔙 Back to Login</a>
</div>
</body>
</html>';
?>
