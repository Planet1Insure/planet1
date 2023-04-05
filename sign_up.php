<?php
// Retrieve form data
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$telephone = $_POST['telephone'];
$dob = $_POST['dob'];
$state = $_POST['state'];
$address = $_POST['address'];
$user_type = $_POST['user_type'];

// Check the user_type to set the minimum password length
if ($user_type == 'admin') {
    $min_password_length = 12;
} else {
    $min_password_length = 8;
}

// Validate the form data
if (strlen($password) < $min_password_length) {
    // Password is too short
    echo "Error: Password must be at least $min_password_length characters long.";
} elseif ($password != $password_confirmation) {
    // Passwords do not match
    echo "Error: Passwords do not match.";
} else {
    // Password is valid, continue with registration process

    // Hash the password using MD5 algorithm
       $password = md5($password);

    // Connect to database
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "insurtech";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email already exists in database
    $sql = "SELECT * FROM insuring WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email already exists, display error message
        echo "Error: Email address already in use.";
    } else {
        // Email does not exist, insert new record
        // Prepare SQL statement
        $sql = "INSERT INTO insuring (email, first_name, last_name, password, dob, telephone, state, address, user_type)
        VALUES ('$email', '$first_name', '$last_name', '$password', '$dob', '$telephone', '$state', '$address', '$user_type')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully. You will be redirected to the login page in 3 seconds";
            // Delay the redirection by 3 seconds
            header("Refresh: 3; URL=login.html");
            exit; // stop script execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close database connection
        $conn->close();
        
}
}
?>