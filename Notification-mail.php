<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insurtech";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the notification date for 6 months before the current date
$notification_date_6m = date("Y-m-d", strtotime("-6 months"));

// Get the notification date for 1 year before the current date
$notification_date_1y = date("Y-m-d", strtotime("-1 year"));

// Query the database for users with a notification date 1 week before 6 months before the current date
$sql_6m = "SELECT * FROM insuring WHERE notification_date BETWEEN DATE_SUB('$notification_date_6m', INTERVAL 7 DAY) AND '$notification_date_6m'";
$result_6m = mysqli_query($conn, $sql_6m);

// Query the database for users with a notification date 1 week before 1 year before the current date
$sql_1y = "SELECT * FROM insuring WHERE notification_date BETWEEN DATE_SUB('$notification_date_1y', INTERVAL 7 DAY) AND '$notification_date_1y'";
$result_1y = mysqli_query($conn, $sql_1y);

// Loop through the results and send email notifications
while ($row = mysqli_fetch_assoc($result_6m)) {
    $to_email = $row['email'];
    $subject = "Upcoming Event Notification";
    $message = "Hello ".$row['name'].",\n\nThis is a reminder that you have an upcoming event 6 months from now on ".$row['notification_date'].".\n\nThank you!";
    $headers = "From: insurtech@yahoo.com";
    mail($to_email, $subject, $message, $headers);
}

while ($row = mysqli_fetch_assoc($result_1y)) {
    $to_email = $row['email'];
    $subject = "Upcoming Event Notification";
    $message = "Hello ".$row['name'].",\n\nThis is a reminder that you have an upcoming event 1 year from now on ".$row['notification_date'].".\n\nThank you!";
    $headers = "From: insurtech@yahoo.com";
    mail($to_email, $subject, $message, $headers);
}
