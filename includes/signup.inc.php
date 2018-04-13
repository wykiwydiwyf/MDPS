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


$pat_name=$_POST['pat_name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$visit_date=$_POST['visit_date'];
$symptom=$_POST['symptom'];
$T=$_POST['T'];
$dur_in_hos=$_POST['dur_in_hos'];





$query  = "INSERT INTO patient_1(pat_id,hos_name,name,age,gender,address,visit_date) VALUES(NULL,(SELECT hos_name FROM hospital),'$pat_name','$age','$gender','$address','$visit_date')";
$query .= "INSERT INTO patient_2(pat_id,hos_name,symptom,dur_in_hos,T) VALUES(NULL,(SELECT hos_name FROM hospital),'symptom','T','dur_in_hos')";

// Execute multi query
if (mysqli_multi_query($con,$sql))
{
  do
    {
    // Store first result set
    if ($result=mysqli_store_result($con)) {
      // Fetch one and one row
      while ($row=mysqli_fetch_row($result))
        {
        printf("%s\n",$row[0]);
        }
      // Free result set
      mysqli_free_result($result);
      }
    }
  while (mysqli_next_result($con));
}

//let them know the person has been added. 
echo "Data successfully inserted into the database table ... ";
/* close connection */
mysqli_close($con);
?>