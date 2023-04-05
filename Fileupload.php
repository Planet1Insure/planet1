<?php
if(isset($_POST["submit"])) {
  $file_count = count($_FILES['file']['name']);
  
  for($i=0;$i<$file_count;$i++){
    $file_name = $_FILES["file"]["name"][$i];
    $file_type = $_FILES["file"]["type"][$i];
    $file_size = $_FILES["file"]["size"][$i];
    $file_temp = $_FILES["file"]["tmp_name"][$i];
    $file_error = $_FILES["file"]["error"][$i];
    
    // Check file type and size
    $allowed_types = array("image/jpeg", "image/png", "image/gif");
    $max_size = 5000000; // 5 MB
    if(in_array($file_type, $allowed_types) && $file_size <= $max_size) {
      
      // Generate unique filename and save to directory
      $upload_dir = "uploads/";
      $upload_file = $upload_dir . uniqid() . "_" . $file_name;
      if(move_uploaded_file($file_temp, $upload_file)) {
        
        // Insert file information into database
        $conn = mysqli_connect("localhost", "root", "", "insurtech");
        $query = "INSERT INTO file_upload (file_name, file_type, file_size, file_path) VALUES ('$file_name', '$file_type', '$file_size', '$upload_file')";
        mysqli_query($conn, $query);
        
        echo "File uploaded successfully.";
        // Delay the redirection by 3 seconds
        header("Refresh: 2; URL=Fileupload.html");
            exit; // stop script execution
      
      } else {
        echo "Error uploading file.";
      }
    }
    else {
      echo "Invalid file type or size. Only JPG, PNG, and GIF files up to 5MB are allowed.";
    }

  }
}
?>
