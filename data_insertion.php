<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>database Insertion</title>
</head>
<body>
<?php
 // servername => localhost 
 // username => root 
 // password => empty 
 // database name => staff 
 $conn = mysqli_connect("localhost", "root", "", "test"); 
          
 // Check connection 
 if($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error()); 
 } 

 //taking values from form data
 $tree_name = $_REQUEST['tree_name'];
 $scientific_name = $_REQUEST['scientific_name'];
 $tree_type = $_REQUEST['tree_type'];
 $tree_number = $_REQUEST['tree_number'];
 $tree_location = $_REQUEST['tree_location'];
 $tree_medicfeature = $_REQUEST['tree_medicfeature'];

 $filename = $_FILES["tree_imgfile"]["name"];
 $tempname = $_FILES["tree_imgfile"]["tmp_name"];     
 $folder = "image/".$filename; 

 // Performing insert query execution 
 $sql = "INSERT INTO
  mybiopark
  (tree_name,
   scientific_name,
   tree_type,tree_number,
   tree_location,
   tree_medicfeature,
   imgfilename)
  VALUES
  ('$tree_name',
   '$scientific_name',
   '$tree_type',
   '$tree_number',
   '$tree_location',
   '$tree_medicfeature',
   '$folder')";

 if(mysqli_query($conn, $sql)){ 
    // Now let's move the uploaded image into the folder: image 
    if (move_uploaded_file($tempname, $folder)) {
      $msg = "Image uploaded successfully"; 
    } else{ 
       $msg = "Failed to upload image"; 
    } 

    echo "<h3>data stored in a database successfully, you will be redirected to your form upload page in 3 seconds....</h3>";
    header( "Refresh:3; url=data_search_form.html", true, 303);    
 } else{ 
    echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn); 
 }   
 
 // Close connection 
    mysqli_close($conn); 

?>
        
</body>
</html>
