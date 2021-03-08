<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Read</title>
</head>
<body>
    <table border=1>
    	<tr>
    	   <th>Tree Name</th>
           <th>scientific name</th>
           <th>image</th>
        </tr>
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

 $tree_name = $_REQUEST['tree_name'];
     	  $result = mysqli_query($conn, "SELECT tree_name, scientific_name FROM mybiopark WHERE name='$tree_name'");
     	  while ($row = mysqli_fetch_array($result)) {
     	  	echo "<tr>";
            echo "<td>".$row['tree_name']."</td>";
            echo "<td>".$row['scientific_name']."</td>";
          	echo "<td>".$row['filename']."</td>";
          	echo "</tr>";
          }
          
          mysqli_close($conn);
        ?>    
    </table>
</body>
</html>