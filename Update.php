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
$email = $_POST['email'] ?? '';
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$password = $_POST['password'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$dob = $_POST['dob'] ?? '';
$state = $_POST['state'] ?? '';
$address = $_POST['address'] ?? '';
$user_type = $_POST['user_type'] ?? '';


// Prepare the SQL query to update the user information
$sql = "UPDATE insuring SET first_name=?, last_name=?, password=?, telephone=?, dob=?, state=?, address=?, user_type=? WHERE email=?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind parameters to the statement
$stmt->bind_param("sssssssss", $first_name, $last_name, $password, $telephone, $dob, $state, $address, $user_type, $email);

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

?>php


<!DOCTYPE html>
<html>
<head>
	<title>User Information Update Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      body {
        display: flex;
        flex-direction: column;
        align-items: right;
        justify-content:right;
        min-width: 20%;
        height: 20%;
      }
      form {
        display: flex;
        flex-direction: column;
        align-items: right;
        justify-content: right;
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #999;
      }
      input[type="text"], input[type="text"], input[type="text"], input[type="password"], input[type="tel"], input[type="date"] {
        width: 30%;
        padding: 10px;
        margin: 2px;
        border-radius: 5px;
        border: none;
      }

      select {
        padding: 10px;
        margin: 5px;
        border-radius: 5px;
        border: none;
        width: 10%;
      }

      input[type="submit"], input[type="Submit"] {
        padding: 10px 20px;
        width: 10%;
        margin: 10px;
        border: none;
        border-radius: 5px;
        color: #fff;
        background-color: #0099ff;
        cursor: pointer;
      }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 fixed-top">
        <div class="container">
     
        <button
           class="navbar-toggler"
           type="button"
           data-bs-toggle="collapse"
           data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a href="Admin.html" class="nav-link">Admin Page</a>            
            </li>                
            </ul>
        </div>  
    </div>
    </nav>
   
      
      
    <!-- Showcase -->

    <section class="bg-dark text-light p-5 p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div>
                    <h1 text-center> Welcome To <span class="text-warning">Planet 1 Insurance</span></h1>
               <p class="lead my=4">
                Revolutionizing motor insurance with cutting-edge technology
               </p>
               
                </div>
              <!--<img class="img-fluid w

              <!--<img class="img-fluid w-50 d-none d-sm-block" src="images/Logosp.jpg" alt="Company logo">  -->
            </div>
            </div>
    </section>

    <title>Create User</title>
    <style>
      body {
        display: flex;
        flex-direction: column;
        align-items: right;
        justify-content:right;
        min-width: 20%;
        height: 20%;
      }
      form {
        display: flex;
        flex-direction: column;
        align-items: right;
        justify-content: right;
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #999;
      }
      input[type="text"], input[type="text"], input[type="text"], input[type="password"], input[type="tel"], input[type="date"] {
        width: 30%;
        padding: 10px;
        margin: 2px;
        border-radius: 5px;
        border: none;
      }

      select {
        padding: 10px;
        margin: 5px;
        border-radius: 5px;
        border: none;
        width: 10%;
      }

      input[type="submit"], input[type="Submit"] {
        padding: 10px 20px;
        width: 10%;
        margin: 10px;
        border: none;
        border-radius: 5px;
        color: #fff;
        background-color: #0099ff;
        cursor: pointer;
      }
    </style>

	<div class="container">
		<h2>User Information Update Form</h2>
		<form action="Update.php" method="POST">
			<form action="Update.php" method="POST">
        <div class="row mb-3">
          <label for="email" class="col-sm-1 col-form-label">Email:</label>
          <div class="col-sm-11">
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email);?>" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="first_name" class="col-sm-1 col-form-label">First Name:</label>
          <div class="col-sm-11">
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name);?>" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="last_name" class="col-sm-1 col-form-label">Last Name:</label>
          <div class="col-sm-11">
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name);?>" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="password" class="col-sm-1 col-form-label">Password:</label>
          <div class="col-sm-11">
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="telephone" class="col-sm-1 col-form-label">Telephone:</label>
          <div class="col-sm-11">
            <input type="tel" class="form-control" id="telephone" name="telephone" value="<?php echo htmlspecialchars($telephone);?>" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="dob" class="col-sm-1 col-form-label">Date of Birth:</label>
          <div class="col-sm-11">
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo htmlspecialchars($dob);?>" required>
            
            <script>
              document.addEventListener('DOMContentLoaded', function() {
                const form = document.querySelector('form');
                const dobInput = document.querySelector('#dob');
                
                // Set the minimum and maximum ages in years
                const minAge = 18;
                const maxAge = 65;
        
                // Calculate the minimum and maximum dates based on the current date
                const now = new Date();
                const minDate = new Date(now.getFullYear() - maxAge, now.getMonth(), now.getDate());
                const maxDate = new Date(now.getFullYear() - minAge, now.getMonth(), now.getDate());
        
                form.addEventListener('submit', function(event) {
                   const selectedDate = new Date(dobInput.value);
                   if (selectedDate < minDate || selectedDate > maxDate) {
                      event.preventDefault();
                      alert('You must be between 18 and 65 years old to register.');
                   }
                });
              });
					
				</script>

				<div class="row mb-3">
					<label for="state" class="col-sm-1 col-form-label">State:</label>
					<div class="col-sm-11">
						<select id="state" name="state" required>
							<option value="" disabled selected>Select state</option>
							<option value="Abuja">Abuja</option>
							<option value="Anambra">Anambra</option>					
							<option value="Kano">Kano</option>					
							<option value="Lagos">Lagos</option>					
							<option value="Rivers">Rivers</option>
					
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="address" class="col-sm-1 col-form-label">Address:</label>
					<div class="col-sm-11">
						<input type="text" id="address" name="address" required>
					</div>
			
                </div>
                <div class="row mb-3">
                  <label for="user_type" class="col-sm-1 col-form-label">User Type:</label>
                  <div class="col-sm-11">
                    <select id="user_type" name="user_type" required>
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-11 offset-sm-1">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
                </form>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                  const form = document.querySelector('form');
                
                  form.addEventListener('submit', function(event) {
                    event.preventDefault();
                
                    const email = form.elements.email.value;
                    const firstName = form.elements.firstName.value;
                    const lastName = form.elements.lastName.value;
                    const password = form.elements.password.value;
                    const telephone = form.elements.telephone.value;
                    const dob = form.elements.dob.value;
                    const state = form.elements.state.value;
                    const address = form.elements.address.value;
                    const userType = form.elements.user_type.value;
                    const enrolmentDate = form.elements.enrolment_date.value;
                
                    const data = {
                      email: email,
                      first_name: firstName,
                      last_name: lastName,
                      password: password,
                      telephone: telephone,
                      dob: dob,
                      state: state,
                      address: address,
                      user_type: userType,
                      enrolment_date: enrolmentDate
                    };
                
                    fetch('backend.php', {
                      method: 'POST',
                      body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(data => {
                      console.log(data);
                      alert(data.message);
                      form.reset();
                    })
                    .catch(error => {
                      console.error(error);
                      alert('An error occurred while updating user information.');
                    });
                  });
                });
                </script>
                </body>
                </html>