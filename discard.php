<?php
session_start();

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

if(isset($_POST['delete_insuring']))
{
    $insuring_id = mysqli_real_escape_string($conn, $_POST['delete_insuring']);

    $query = "DELETE FROM insuring WHERE id='$insuring_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: crud.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: crud.php");
        exit(0);
    }
}

if(isset($_POST['update_insuring']))
{
    $insuring_id = mysqli_real_escape_string($conn, $_POST['insuring_id']);

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $address= mysqli_real_escape_string($conn, $_POST['address']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

    $query = "UPDATE insuring SET email='$email', first_name='$first_name',last_name='$last_name', 
    telephone='$telephone', dob='$dob', state='$state', address='$address', user_type='$user_type' WHERE id='$insuring_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Account Updated Successfully";
        header("Location: crud.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Account Not Updated";
        header("Location: crud.php");
        exit(0);
    }

}


if(isset($_POST['save_insuring']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $address= mysqli_real_escape_string($con, $_POST['address']);
    $user_type = mysqli_real_escape_string($con, $_POST['user_type']);

    $query = "INSERT INTO insuring (email, first_name, last_name, dob, telephone, state, address, user_type)
    VALUES ('$email', '$first_name', '$last_name', '$dob', '$telephone', '$state', '$address', '$user_type')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "User Created Successfully";
        header("Location: Admin.html");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Created";
        header("Location: Admin.html");
        exit(0);
    }
}

?>