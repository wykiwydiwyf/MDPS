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
        


$pat_name=$_POST['pat_name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$visit_date=$_POST['visit_date'];
$symptom=$_POST['symptom'];
$T=$_POST['T'];
$dur_in_hos=$_POST['dur_in_hos'];

//Command to insert into table
$query = "INSERT INTO patient_1 values(NULL,(SELECT hos_name FROM hospital),'$pat_name','$age','$gender','$address','$visit_date'); INSERT INTO patient_2(pat_id,hos_name,symptom,dur_in_hos,T) VALUES(NULL,(SELECT hos_name FROM hospital),'symptom','T','dur_in_hos')";
//run the query to insert the person. 
$result = mysqli_query($conn, $query); 

//let them know the person has been added. 
echo "Data successfully inserted into the database table ... ";
?>