<?php
session_start();

// establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insurtech";

$conn = new mysqli($servername, $username, $password, $dbname);

// check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the user's email from the session or database
$email = $_SESSION['email']; // or $email = $row['email']; 

// Retrieve the current password and new password from the form
$current_password = $_POST['current-password'];
$new_password = $_POST['new-password'];
$confirm_password = $_POST['confirm-password'];

$sql = "SELECT password FROM insuring WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (!$row || $row['password'] !== md5($current_password)) {
  // Current password is incorrect, display an error message
  echo "incorrect password";
  // ...
} else {
  // Current password is correct, update the password in the database
  $hash = md5($new_password);
  // Update the password using the user's email
  $sql = "UPDATE insuring SET password = ? WHERE email = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $hash, $email);
  mysqli_stmt_execute($stmt);

  // Password updated successfully, redirect the user to a success page
  ob_start(); // start output buffering
  echo "Password updated successfully!<br>";
  echo "You will be redirected to the login page in a few seconds.";
  $output = ob_get_clean(); // get the buffered output
  echo "Password updated successfully!<br>";
  echo "You will be redirected to the login page in a few seconds.";
  header("refresh:3;url=login.html");
  exit(); // terminate script execution immediately after the redirect
}

?>
