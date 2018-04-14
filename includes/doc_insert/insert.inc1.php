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


$doc_id=$_POST['doc_id'];
$pat_id=$_POST['pat_id'];
$todo=$_POST['todo'];
$month=$_POST['month'];
$dt=$_POST['dt'];
$year=$_POST['year'];

$date="$year-$month-$dt";


$sql  = "INSERT INTO patient_1(pat_id,doc_id,date) VALUES('$pat_id','$doc_id','$date');";
mysqli_query($conn, $sql);


//let them know the person has been added. 
echo "Data successfully inserted into the database table ... ";

/* close connection */
mysqli_close($conn);
?>