<?php
    session_start();
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
?>



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
              <!--<img class="img-fluid w-50 d-none d-sm-block" src="images/Logosp.jpg" alt="Company logo">  -->
            </div>
            </div>
    </section>

    

<section>
<div class="container mt-4">

  <?php include('message.php'); ?>

  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4>Users Details
                      <a href="CreateUser.html" class="btn btn-primary float-end">Create New Users</a>
                  </h4>
              </div>
              <div class="card-body">

                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Email</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Telephone</th>
                              <th>DOB</th>
                              <th>State </th>
                              <th>Address</th>
                              <th>User Type</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                          <?php 
                              $query = "SELECT * FROM insuring";
                              $query_run = mysqli_query($conn, $query);

                              if(mysqli_num_rows($query_run) > 0)
                              {
                                  foreach($query_run as $insuring)
                                  {
                                      ?>
                                      <tr>
                                          <td><?= $insuring['id']; ?></td>
                                          <td><?= $insuring['email']; ?></td>
                                          <td><?= $insuring['first_name']; ?></td>
                                          <td><?= $insuring['last_name']; ?></td>
                                          <td><?= $insuring['telephone']; ?></td>
                                          <td><?= $insuring['dob']; ?></td>
                                          <td><?= $insuring['state']; ?></td>
                                          <td><?= $insuring['address']; ?></td>
                                          <td><?= $insuring['user_type']; ?></td>
                                          <td>
                                              <!-- <a href="=<?= $insuring['id']; ?>" class="btn btn-dark btn-sm">View</a>-->
                                              <a href="edit.php?id=<?= $insuring['id']; ?>" class="btn btn-dark btn-sm">Edit</a>
                                              <form action="discard.php" method="POST" class="d-inline">
                                                  <button type="submit" name="delete_insuring" value="<?=$insuring['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                              </form>
                                          </td>
                                      </tr>
                                      <?php
                                  }
                              }
                              else
                              {
                                  echo "<h5> No Record Found </h5>";
                              }
                          ?>
                          
                      </tbody>
                  </table>

              </div>
          </div>
      </div>
  </div>
</div>
   
<br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   <!-- Footer -->
   <footer class="p-5 bg-dark text-white text-center position-relative">
    <div class="container">
      <p class="lead">Copyright &copy; 2021 Frontend Bootcamp</p>

      <a href="#" class="position-absolute bottom-0 end-0 p-5">
        <i class="bi bi-arrow-up-circle h1"></i>
      </a>
    </div>
  </footer>