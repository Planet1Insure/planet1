<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="stylesheet" href="style.css">
    <title>Planet 1 Insurance </title>
    
  </head>
  <body>
	<table>
		<tr>
			<th>Email</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Date of Birth</th>
			<th>State</th>
			<th>User Type</th>
		</tr>

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

			// Retrieve data from the database
			$sql = "SELECT email, first_name, last_name, dob, state, user_type FROM insuring";
			$result = mysqli_query($conn, $sql);

			// Display the data on the webpage
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row["email"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["state"] . "</td><td>" . $row["user_type"] . "</td></tr>";
				}
			} else {
				echo "0 results";
			}

			mysqli_close($conn);
		?>
	</table>
</body>
</html>
