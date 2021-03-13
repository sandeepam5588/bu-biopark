<!DOCTYPE html>
<html>

<head>
    <title>data display page</title>
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">
       .container {
            margin: 2.5rem;
            padding: 2rem;
            width: 600px;
            height: 600px;
            float: left;
            background-color: tomato;
        }

        form>fieldset {
            border: 3px solid white;
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

$sql = "SELECT * FROM mybiopark";
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
    echo "0 results";
}

$conn->close();
?>
    <div class="container">
        <img src=" <?php echo $imgfilepath ?>" alt="tree image" width="600" height="600">
    </div>
    <div class="container">
        <form>
            <fieldset>
                <legend>Tree Information</legend>

                <label>Tree Name</label>
                <label><?php echo $tree_name ?></label><br>

                <label>scientific Name</label>
                <label><?php echo $scientific_name ?></label><br>

                <label>type</label>
                <label><?php echo $tree_type ?></label><br>

                <label>tree number</label>
                <label><?php echo $tree_number ?></label><br>

                <label>tree location</label>
                <label><?php echo $tree_location ?></label><br>

                <label>medical use</label>
                <label><?php echo $tree_medicfeature ?></label><br>

            </fieldset>
        </form>
    </div>
     <!-- footer -->
     <footer class="footer"> 
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