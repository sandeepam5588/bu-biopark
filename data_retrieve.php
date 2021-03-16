<!DOCTYPE html>
<html>

<head>
    <title>data display page</title>
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">
       .myimgcontainer {
            margin: 1rem 1rem 1.5rem 6rem;
            padding: 2rem;
            width: 650px;
            height: 600px;
            float: left;
            background-color: tomato;
        }
         .mytextcontainer {
            margin: 1rem 1rem 1.5rem 1rem;
            padding: 2rem;
            width: 650px;
            height: 600px;
            float: left;
            background-color: tomato;
        }

        form>fieldset {
            border: 3px solid white;
            font-weight: 700;
        }

        label {
            float: left;
            font-size: 1.2rem;
        }
        input{
            float: right;
            font-size: 1.2rem;
            margin-right: 1rem;
            width: 320px;
        }

        textarea {
            margin-right:1rem;
            float: right;
            width: 320px;
            height: 100px;
            font-size: 1.2rem;
        }
        
    </style>
</head>

<body>
     <!-- Navigation bar -->
     <nav class="navigation container">
        <div class="nav-brand">Jnanabharathi Nisargadhama</div>
        <ul class="list-non-bullet nav-pills">
            <li class="list-item-inline">
                <a href="/" class="link link-active">HOME</a>
            </li>
            <li class="list-item-inline">
                <a href="data_search_form.html" class="link">SEARCH</a>
            </li>
            <li class="list-item-inline">
                <a href="data_upload_form.html" class="link">UPLOAD</a>
            </li>
        </ul>
    </nav>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM mybiopark WHERE tree_name = '".$_REQUEST['tree_name']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $tree_name = $row["tree_name"];
        $scientific_name = $row["scientific_name"];
        $tree_type = $row["tree_type"];
        $tree_number = $row["tree_number"];
        $tree_location = $row["tree_location"];
        $tree_medicfeature = $row["tree_medicfeature"];
        $imgfilepath = $row["imgfilename"];
    }
} else {
    die("<h3><center>No Such Data.. Please enter the valid tree name</center</h3>");
    header( "Refresh:3; url=data_search_form.html", true, 303);    
}
$conn->close();
?>
    <div class="myimgcontainer">
        <img src="<?php echo $imgfilepath ?>" alt="tree image" width="600" height="550">
        <!-- <img src="image/p1 (2).jpg" alt="tree image" width="600" height="600">
 -->
    </div>
    <div class="mytextcontainer">

    <form>
     <fieldset>
                <legend>Tree Information</legend> 
              
            <p> 
                <label for="treeName">Tree Name</label> 
                <input type="text" value="<?php echo $tree_name ?>" readonly /> 
            </p>  
            <br>

            <p> 
                <label for="scientificName">Scientific Name</label> 
                <input type="text" value="<?php echo $scientific_name ?>" readonly /> 
            </p> 
            <br>

             <p> 
                <label for="type">Type</label> 
                <input type="text" value="<?php echo $tree_type ?>" readonly /> 
            </p> 
            <br>

             <p> 
                <label for="tree_number">Tree number</label> 
                <input type="text" value="<?php echo $tree_number ?>" readonly /> 
            </p>
            <br>

             <p> 
                <label for="tree_location">location</label> 
                <input type="text" value="<?php echo $tree_location ?>" readonly /> 
            </p>  
            <br>

             <p> 
                <label for="tree_medicfeature">Medicinal features</label> 
                <textarea rows="5" cols="25"><?php echo $tree_medicfeature ?></textarea>
            </p> 
            <br>

            </fieldset>
        </form>
    </div>
     <!-- footer -->
     <footer class="footer" style="margin-top: 660px"> 
        <div class="footer-header">social media presence</div>
            <ul class="links-social list-non-bullet">
               <li class="list-item-inline">
                   <a href="https://github.com/sandeepam5588" class="link link-primary">github</a>
               </li>
               <li class="list-item-inline">
                   <a href="https://www.linkedin.com/in/sandeepa-m-3866ab200/" class="link link-primary">linkedin</a>
                </li>
               <li class="list-item-inline">
                   <a href="https://www.hackerrank.com/sandeepa_m" class="link link-primary">Hackerrank</a>
                </li>
                <li class="list-item-inline">
                    <a href="https://repl.it/repls" class="link link-primary">REPL</a>
                 </li>
            </ul>
        </div>
    </footer>
</body>

</html>