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

// Get the user information from the form
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$telephone = $_POST['telephone'];
$dob = $_POST['dob'];
$state = $_POST['state'];
$address = $_POST['address'];
$user_type = $_POST['user_type'];


// Prepare the SQL query to update the user information
$sql = "UPDATE insuring SET first_name=?, last_name=?, password=?, telephone=?, dob=?, state=?, address=?, user_type=? WHERE email=?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind parameters to the statement
$stmt->bind_param("ssssssssss", $first_name, $last_name, $password, $telephone, $dob, $state, $address, $user_type, $email);

// Execute the statement
$stmt->execute();

// Check if the update was successful
if ($stmt->affected_rows > 0) {
  echo "User information updated successfully.";
} else {
  echo "Failed to update user information.";
}

// Close the statement and database connections
$stmt->close();
$conn->close();

?>