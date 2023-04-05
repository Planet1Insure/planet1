<?php
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

    
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update User
                            <a href="Admin.html" class="btn btn-dark float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $insuring_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM insuring WHERE id='$insuring_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $insuring = mysqli_fetch_array($query_run);
                                ?>
                                <form action="discard.php" method="POST">
                                    <input type="hidden" name="insuring_id" value="<?= $insuring['id']; ?>">

                                  
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?=$insuring['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" value="<?=$insuring['first_name'];?>" class="form-control">
                                    </div>
                                   
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" value="<?=$insuring['last_name'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Telephone</label>
                                        <input type="text" name="telephone" value="<?=$insuring['telephone'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Dob</label>
                                        <input type="text" name="dob" value="<?=$insuring['dob'];?>" class="form-control">
                                    </div>
                                   
                                    <div class="mb-3">
                                        <label>State</label>
                                        <input type="text" name="state" value="<?=$insuring['state'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <input type="text" name="address" value="<?=$insuring['address'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>User Type</label>
                                        <input type="text" name="user_type" value="<?=$insuring['user_type'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_insuring" class="btn btn-primary">
                                            Update User
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>