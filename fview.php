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

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Users Details 
                            <a href="Admin.php" class="btn btn-danger float-end">BACK</a>
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
                                
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=$insuring['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <p class="form-control">
                                            <?=$insuring['first_name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <p class="form-control">
                                            <?=$insuring['last_name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Telephone</label>
                                        <p class="form-control">
                                            <?=$insuring['telephone'];?>
                                        </p>
                                    </div>
                                   
                                    <div class="mb-3">
                                        <label>Dob</label>
                                        <p class="form-control">
                                            <?=$insuring['dob'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>State</label>
                                        <p class="form-control">
                                            <?=$insuring['state'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Address</label>
                                        <p class="form-control">
                                            <?=$insuring['address'];?>
                                        </p>
                                    </div>
                                     
                                    <div class="mb-3">
                                        <label>User_Type</label>
                                        <p class="form-control">
                                            <?=$insuring['user_type'];?>
                                        </p>
                                    </div>
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