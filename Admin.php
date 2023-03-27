<?php
// start the session
session_start();

// check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // get the login credentials from the form
  $email = $_POST["email"];
  $password = $_POST["password"];
  $user_type = $_POST["user_type"];

  // validate the input
  if (empty($email)) {
    echo "Email must be filled out";
    exit();
  }

  if (empty($password)) {
    echo "Password must be filled out";
    exit();
  }

  if ($user_type == "admin") {
    // add your custom validation logic here for admin users
    // for example, you might check if the email and password are valid
    // if validation fails, show error message and return false
    // otherwise, store the user information in the session and redirect to the admin backend
    if ($email == "admin@example.com" && $password == "admin123") {
      $_SESSION["user_type"] = "admin";
      header("Location: admin.html");
      exit();
    } else {
      echo "Invalid email or password";
      exit();
    }
  } elseif ($user_type == "user") {
    // add your custom validation logic here for regular users
    // for example, you might check if the email and password are valid
    // if validation fails, show error message and return false
    // otherwise, store the user information in the session and redirect to the user dashboard
    if ($email == "user@example.com" && $password == "user123") {
      $_SESSION["user_type"] = "user";
      header("Location: user_dashboard.php");
      exit();
    } else {
      echo "Invalid email or password";
      exit();
    }
  } else {
    echo "Invalid user type";
    exit();
  }
}
?>
