<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>INFS7901-Tables</title>
</head>
<body>

    <h1>Information for all surgeries</h1>

    <?php 
        // SETUP PHP CONNECTION
        $servername = "localhost";
        $username = "root";
        $password = "d74dbdad52b2dfe8";
        $dbname = "project_hospital";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("<h3>Connection failed: ".$conn->connect_error."</h3>");
        }
    ?>

  <?php
  
  echo "<h2>MYSQL CODE</h2>";
  echo "SELECT p.pat_id,p.pat_name,d.doc_id,d.doc_name,pd2.disease,pd2.treatment<br>";
  echo "from doctor as d, pat_doc_2 as pd2 ,patient_1 as p<br>";
  echo "where d.doc_id = pd2.doc_id and p.pat_id = pd2.pat_id and pd2.if_surge = 1<br>";

    ?>
    
  
  <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Patient ID</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Doctor ID</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Disease</th>
                <th scope="col">Treatment</th>
            </tr>
        </thead>
        <tbody id="queryTable1">
          <?php
                // FILL TABLE WITH DATA ON CLICK
                    $query = "SELECT p.pat_id,p.pat_name,d.doc_id,d.doc_name,pd2.disease,pd2.treatment
from doctor as d, pat_doc_2 as pd2 ,patient_1 as p
where d.doc_id = pd2.doc_id and p.pat_id = pd2.pat_id and pd2.if_surge = 1
";
                    $result = mysqli_query($conn, $query);
                    // put all our results into a html table
                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$rows["pat_id"]."</td>";
                        echo "<td>".$rows["pat_name"]."</td>";
                        echo "<td>".$rows["doc_id"]."</td>";
                        echo "<td>".$rows["doc_name"]."</td>";
                        echo "<td>".$rows["disease"]."</td>";
                        echo "<td>".$rows["treatment"]."</td>";
                        echo "</tr>";
                }
            ?>
        </tbody>
    </table>

  <?php
// error_reporting(1) function hides all errors Mostly Notice Error
 
error_reporting(1);
 
//retrieve email id entered by user and store in $eid. and so on for other values
 
$hos_name=$_POST['hos_name'];
$pat_name=$_POST['pat_name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$visit_date=$_POST['visit_date'];

 

 
if(isset($_POST['ins']))
{
$sql="INSERT INTO patient_1 values('$hos_name','$pat_name','$age','$gender','$address','$visit_date')";
 
mysql_query($sql);

echo "data saved";
}

?>


  <?php 
//load database connection 
include("php-connect.php");  
$hos_name=$_POST['hos_name'];
$pat_name=$_POST['pat_name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$visit_date=$_POST['visit_date'];


//Command to insert into table
$query = "INSERT INTO patient_1 values('$hos_name','$pat_name','$age','$gender','$address','$visit_date')";
 
//run the query to insert the person. 
$result = mysql_query($query) OR die(mysql_error()); 

//let them know the person has been added. 
echo "Data successfully inserted into the database table ... ";
?>
  
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>