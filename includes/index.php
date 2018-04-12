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
        

$hos_name=$_POST['hos_name'];
$pat_name=$_POST['pat_name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$visit_date=$_POST['visit_date'];


//Command to insert into table
$query = "INSERT INTO patient_1 values('$hos_name','$pat_name','$age','$gender','$address','$visit_date')";
 
//run the query to insert the person. 
$result = mysqli_query($conn, $query); 

//let them know the person has been added. 
echo "Data successfully inserted into the database table ... ";
?>