<?php
// Retrieve form data
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$vehicle_brand = $_POST['motor'];
$vehicle_color = $_POST['color'];
$purchase_year = $_POST['date'];
$number_plate = $_POST['plate'];
$state = $_POST['state'];
$address = $_POST['address'];
$policy_type = $_POST['type'];


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
    $sql = "SELECT * FROM insured_vehicles WHERE email='$email'";
    $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
        // Email already exists, display error message
       // echo "Error: Email address already in use.";
    //} else {
        // Email does not exist, insert new record
        // Prepare SQL statement
        $sql = "INSERT INTO insured_vehicles (email, first_name, last_name, vehicle_brand, vehicle_color, purchase_year, number_plate, state, address, policy_type)
        VALUES ('$email', '$first_name', '$last_name', '$vehicle_brand', '$vehicle_color', '$purchase_year', '$number_plate', '$state', '$address', '$policy_type')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully. You will be redirected to the login page in 3 seconds";
            // Delay the redirection by 3 seconds
            header("Refresh: 3; URL=Home.html");
            exit; // stop script execution
        } elseif ($conn->query($sql) !== TRUE) {
            echo "Email not in our database";
        } else {
            echo "Vehicle Number Plate Under Insurance Cover";
        }
    
        // Close database connection
        $conn->close();
        
//}

?>