<?php

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insurtech";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

// Hash the password using MD5 algorithm
$password = md5($password);

// Prepare SQL statement
$sql = "SELECT * FROM insuring WHERE email='$email' AND password='$password' AND user_type='$user_type'";
$result = $conn->query($sql);

// Check if user exists
if ($result->num_rows > 0) {
  // User is authenticated, set session cookie and redirect to appropriate page based on user_type
  $_SESSION['email'] = $email;
  $_SESSION['user_type'] = $user_type;
  
  if ($user_type == "admin") {
    header("Location: Admin.html");
  } else if ($user_type == "user") {
    header("Location: Home.html");
  } else {
    // Invalid user type, display error message
    echo "Invalid user type";
  }
} else {
  // User does not exist, display error message
  echo "Invalid email or password or user type";
}

// Close database connection
$conn->close();

?>