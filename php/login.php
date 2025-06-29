<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password']; // plain text

$query = "SELECT * FROM USERS WHERE Email = '$email'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $user = mysqli_fetch_assoc($result);

  if ($password === $user['password']) {
    $_SESSION['user'] = $user;
    $userID = $user['User_ID'];

    $instructor = mysqli_query($conn, "SELECT * FROM INSTRUCTOR WHERE Instructor_ID = $userID");
    $labto = mysqli_query($conn, "SELECT * FROM LABTO WHERE LabTO_ID = $userID");

    if (mysqli_num_rows($instructor)) {
      header('Location: ../pages/instructor-dashboard.html');
      exit();
    } elseif (mysqli_num_rows($labto)) {
      header('Location: ../pages/labto-dashboard.html');
      exit();
    } else {
      echo "Unauthorized user.";
    }
  } else {
    echo "Incorrect password.";
  }
} else {
  echo "User not found.";
}
?>
